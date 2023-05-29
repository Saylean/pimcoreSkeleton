pimcore.registerNS("pimcore.plugin.UMGBundle");

pimcore.plugin.UMGBundle = Class.create({

    initialize: function () {
        document.addEventListener(pimcore.events.pimcoreReady, this.pimcoreReady.bind(this));
    },

    pimcoreReady: function (e) {
        // alert("UMGBundle ready!");
    }
});

var UMGBundlePlugin = new pimcore.plugin.UMGBundle();
