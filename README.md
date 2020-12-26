# LiveStream直播平台

## 安装依赖

```
npm install
```

### 运行Vue ui

```
vue ui
```

### 选择任务里的cordova-build-only-www-android将项目编译到Cordova的www目录

```
cross-env CORDOVA_PLATFORM=android vue-cli-service cordova-build-only-www-android
```

### `cd /src-cordova`进入Cordova根目录

1. 编译安装apk

`cordova build android --release`

2. 调试

    - 首先需要adb连接到安卓手机有线无线都可以，举个无线调试的例子
    - `adb connect 192.168.31.130`
    - `cordova run android --target=192.168.31.130:5555`

### 手机调试加自动编译,选择vue ui里的cordova-serve-android运行或执行命令

```
cross-env CORDOVA_PLATFORM=android vue-cli-service cordova-serve-android
```
