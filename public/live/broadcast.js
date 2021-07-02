var vm = new Vue({
    el : '#app',
    data : {
        camera : false ,
        live : false,
    },
    methods : {
        openCamera : function () {

            navigator.mediaDevices
                .getUserMedia(constraints)
                .then(stream => {
                    video.srcObject = stream;
                    vm.camera = true;
                    // socket.emit("broadcaster");
                })
                .catch(error => console.error(error));
        },
        closeCamera : function () {
            const mediaStream = video.srcObject;
            const tracks = mediaStream.getTracks();
            tracks[0].stop();
            tracks.forEach(track => track.stop());
            this.camera = false;
            this.endLive();

        },
        startLive : function () {
            socket.emit("broadcaster");
            video.play();
            this.live = true;
        },
        endLive : function () {
            socket.emit("disconnect-live");
            this.live = false;
        },
    }
});

const peerConnections = {};
const config = {
    iceServers: [
        {
            urls: ["stun:stun.l.google.com:19302"]
        }
    ]
};

const socket = io.connect('http://localhost:4000');
const video = document.querySelector("video");

// Media contrains
const constraints = {
    video: { facingMode: "user" },
    // Uncomment to enable audio
     audio: true,
};


socket.on("watcher", id => {
    const peerConnection = new RTCPeerConnection(config);
    peerConnections[id] = peerConnection;

    let stream = video.srcObject;
    stream.getTracks().forEach(track => peerConnection.addTrack(track, stream));

    peerConnection.onicecandidate = event => {
        if (event.candidate) {
            socket.emit("candidate", id, event.candidate);
        }
    };

    peerConnection
        .createOffer()
        .then(sdp => peerConnection.setLocalDescription(sdp))
        .then(() => {
            socket.emit("offer", id, peerConnection.localDescription);
        });
});

socket.on("answer", (id, description) => {
    peerConnections[id].setRemoteDescription(description);
});

socket.on("candidate", (id, candidate) => {
    peerConnections[id].addIceCandidate(new RTCIceCandidate(candidate));
});

socket.on("disconnectPeer", id => {
    peerConnections[id].close();
    delete peerConnections[id];
});

window.onunload = window.onbeforeunload = () => {
    socket.close();
};

// setInterval(function () {
//     console.log(peerConnections);
// } , 1000);

