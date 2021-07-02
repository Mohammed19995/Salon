window.HOST_URL = "https://keenthemes.com/metronic/tools/preview";
window.KTAppSettings = {
    "breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400},
    "colors": {
        "theme": {
            "base": {
                "white": "#ffffff",
                "primary": "#3699FF",
                "secondary": "#E5EAEE",
                "success": "#1BC5BD",
                "info": "#8950FC",
                "warning": "#FFA800",
                "danger": "#F64E60",
                "light": "#E4E6EF",
                "dark": "#181C32"
            },
            "light": {
                "white": "#ffffff",
                "primary": "#E1F0FF",
                "secondary": "#EBEDF3",
                "success": "#C9F7F5",
                "info": "#EEE5FF",
                "warning": "#FFF4DE",
                "danger": "#FFE2E5",
                "light": "#F3F6F9",
                "dark": "#D6D6E0"
            },
            "inverse": {
                "white": "#ffffff",
                "primary": "#ffffff",
                "secondary": "#3F4254",
                "success": "#ffffff",
                "info": "#ffffff",
                "warning": "#ffffff",
                "danger": "#ffffff",
                "light": "#464E5F",
                "dark": "#ffffff"
            }
        },
        "gray": {
            "gray-100": "#F3F6F9",
            "gray-200": "#EBEDF3",
            "gray-300": "#E4E6EF",
            "gray-400": "#D1D3E0",
            "gray-500": "#B5B5C3",
            "gray-600": "#7E8299",
            "gray-700": "#5E6278",
            "gray-800": "#3F4254",
            "gray-900": "#181C32"
        }
    },
    "font-family": "Poppins"
};

require('../js/app.js');

window.KTUtil = require('../../public/admin_assets/src/js/components/util.js');
window.KTApp = require('../../public/admin_assets/src/js/components/app.js');

/******************************************************************************/
window.KTCard = require('../../public/admin_assets/src/js/components/card.js');
window.KTCookie = require('../../public/admin_assets/src/js/components/cookie.js');
window.KTDialog = require('../../public/admin_assets/src/js/components/dialog.js');
window.KTHeader = require('../../public/admin_assets/src/js/components/header.js');
window.KTImageInput = require('../../public/admin_assets/src/js/components/image-input.js');
window.KTMenu = require('../../public/admin_assets/src/js/components/menu.js');
window.KTOffcanvas = require('../../public/admin_assets/src/js/components/offcanvas.js');
window.KTScrolltop = require('../../public/admin_assets/src/js/components/scrolltop.js');
window.KTToggle = require('../../public/admin_assets/src/js/components/toggle.js');
window.KTWizard = require('../../public/admin_assets/src/js/components/wizard.js');

// Metronic layout base js
window.KTLayoutAside = require('../../public/admin_assets/src/js/layout/base/aside.js');
window.KTLayoutAsideMenu = require('../../public/admin_assets/src/js/layout/base/aside-menu.js');
window.KTLayoutAsideToggle = require('../../public/admin_assets/src/js/layout/base/aside-toggle.js');
window.KTLayoutBrand = require('../../public/admin_assets/src/js/layout/base/brand.js');
window.KTLayoutContent = require('../../public/admin_assets/src/js/layout/base/content.js');
window.KTLayoutFooter = require('../../public/admin_assets/src/js/layout/base/footer.js');
window.KTLayoutHeader = require('../../public/admin_assets/src/js/layout/base/header.js');
window.KTLayoutHeaderMenu = require('../../public/admin_assets/src/js/layout/base/header-menu.js');
window.KTLayoutHeaderTopbar = require('../../public/admin_assets/src/js/layout/base/header-topbar.js');
window.KTLayoutStickyCard = require('../../public/admin_assets/src/js/layout/base/sticky-card.js');
window.KTLayoutStretchedCard = require('../../public/admin_assets/src/js/layout/base/stretched-card.js');
window.KTLayoutSubheader = require('../../public/admin_assets/src/js/layout/base/subheader.js');

// Metronic layout extended js
window.KTLayoutChat = require('../../public/admin_assets/src/js/layout/extended/chat.js');
window.KTLayoutDemoPanel = require('../../public/admin_assets/src/js/layout/extended/demo-panel.js');
window.KTLayoutExamples = require('../../public/admin_assets/src/js/layout/extended/examples.js');
window.KTLayoutQuickActions = require('../../public/admin_assets/src/js/layout/extended/quick-actions.js');
window.KTLayoutQuickCartPanel = require('../../public/admin_assets/src/js/layout/extended/quick-cart.js');
window.KTLayoutQuickNotifications = require('../../public/admin_assets/src/js/layout/extended/quick-notifications.js');
window.KTLayoutQuickPanel = require('../../public/admin_assets/src/js/layout/extended/quick-panel.js');
window.KTLayoutQuickSearch = require('../../public/admin_assets/src/js/layout/extended/quick-search.js');
window.KTLayoutQuickUser = require('../../public/admin_assets/src/js/layout/extended/quick-user.js');
window.KTLayoutScrolltop = require('../../public/admin_assets/src/js/layout/extended/scrolltop.js');
window.KTLayoutSearch = window.KTLayoutSearchOffcanvas = require('../../public/admin_assets/src/js/layout/extended/search.js');
require('../../public/admin_assets/src/js/layout/initialize.js');
/**************************************************************************************************/

require('../../public/admin_assets/custom/js/api.js');
require('../../public/admin_assets/custom/js/general.js');
require('../../public/admin_assets/custom/js/datatable-custom.js');
require('../../public/admin_assets/custom/js/init.js');


