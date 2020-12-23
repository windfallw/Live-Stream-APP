module.exports = {
    "transpileDependencies": [
        "vuetify"
    ],

    outputDir: './src-cordova/www',
    publicPath: '',
    assetsDir: 'static',
    runtimeCompiler: true,

    pluginOptions: {
        cordovaPath: 'src-cordova'
    }
}
