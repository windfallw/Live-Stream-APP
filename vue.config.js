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
    },

    devServer: {
        overlay: {
            warnings: false, //不显示警告
            errors: false	//不显示错误
        }
    },
    lintOnSave: false //关闭eslint检查
}
