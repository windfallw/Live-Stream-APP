# LiveStream直播平台

**这是一个用了7天即兴发挥完成的课程设计，因此它的稳定性无法得到保证也仅作为娱乐而已。**

### 安装依赖

```
npm install
```

### 服务器配置

- 配置rtmp推流服务器教程可以在我的[博客](https://windfallw.com)里找到。（博客里还有这个程序的简单介绍）

- 将[这里](https://github.com/windfallw/Live-Stream-APP/blob/master/src/views/home.vue#L164)修改为自己的服务器IP或域名。

- 在[这里](https://github.com/windfallw/Live-Stream-APP/blob/master/src/views/home.vue#L324-L351)可以自定义服务器提供服务的路径。

- 你可以将`app-php`文件夹中的`php`文件简单修改后放到服务器上的相应路径，或者根据实际情况自己解决。

### 运行Vue ui

```
vue ui
```

### 编译vue项目

选择任务里的cordova-build-only-www-android或执行以下命令将项目编译到Cordova的www目录

```
cross-env CORDOVA_PLATFORM=android vue-cli-service cordova-build-only-www-android
```

### 手机调试加自动编译

选择`vue ui`里的`cordova-serve-android`运行或执行命令

```
cross-env CORDOVA_PLATFORM=android vue-cli-service cordova-serve-android
```

### 进入Cordova根目录

1. 编译安装apk

`cordova build android --release`

2. 调试

    - 首先需要`adb`连接到安卓手机有线无线都可以
    - 举个无线调试的例子
    ```
    adb connect 192.168.31.130
    cordova run android --target=192.168.31.130:5555
    ```

## 致谢

`Vue`和`vuetify`还有`Cordova`和`Vue`的集成插件

- [vue](https://github.com/vuejs/vue)
- [vuetify](https://github.com/vuetifyjs/vuetify)
- [vue-cli-plugin-cordova](https://github.com/m0dch3n/vue-cli-plugin-cordova)

Cordova和Cordova推流插件还有摄像头插件

- [cordova-android](https://github.com/apache/cordova-android)（在我被`HbuilderX`和`uni-app`心态搞炸掉时的救星）
- [cordova-rtmp-rtsp-stream](https://github.com/disono/cordova-rtmp-rtsp-stream)
- [cordova-plugin-camera](https://github.com/apache/cordova-plugin-camera)

docker搭建rtmp服务器

- [nginx-rtmp-docker](https://github.com/tiangolo/nginx-rtmp-docker)

好用的工具

- [scrcpy](https://github.com/Genymobile/scrcpy)（这个工具可以通过`adb`无线或者有线投屏调试超级方便）

此外还有好多需要感谢的。

## 其它

logo和APP载入界面都是使用[canva](https://www.canva.com/)设计的。（其实只是简单的拖拽图片拼凑起来的）

<img width="256" src="./src-cordova/resources/icon.png" alt="logo" align="left">
