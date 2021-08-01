<!--/**-->
<!-- * Created by PhpStorm-->
<!-- * Author: sandmliu-->
<!-- * Date: 2020/3/22-->
<!-- * Time: 23:32-->
<!-- */-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>测量工具</title>
    <link rel="stylesheet" href="/static/css/main.css" type="text/css" />
</head>
<script charset="utf-8" src="https://map.qq.com/api/gljs?libraries=tools&v=1.exp&key=TEWBZ-G7NKV-AECP6-U7QJE-CSC3O-XSB43"></script>
<style type="text/css">
    html,
    body {
        height: 100%;
        margin: 0px;
        padding: 0px;
    }

    #container {
        width: 100%;
        height: 100%;
    }
    .toolControl {
        width: 100px;
        position: absolute;
        top: 10px;
        left: 10px;
        z-index: 1001;
    }
    .toolControl div {
        width: 60px;
        height: 30px;
        line-height: 30px;
        font-size: 18px;
        padding: 4px;
        border-radius: 3px;
        text-align: center;
        margin: 2px;
        cursor: pointer;
    }
    .toolControl .active {
        background-color: #548efd;
        color: #fff;
    }
    .toolControl .inactive {
        background-color: #ffffff;
    }
    .toolControl #measure {
        width: 130px;
        font-size: 16px;
        margin-top: 20px;
    }
</style>

<body onload="initMap()">
<div id="container"></div>
<div class="toolControl">
    <div onclick="enable(true)" id="enable" class="active">启用</div>
    <div onclick="enable(false)" id="disable" class="inactive">禁用</div>
    <div onclick="measure()" id="measure" class="inactive">点击这里开始测量</div>
</div>
<script type="text/javascript">
    var map, measureTool;
    function initMap() {
        // 初始化地图
        map = new TMap.Map("container", {
            zoom:12, // 设置地图缩放级别
            center: new TMap.LatLng(39.984104, 116.307503) // 设置地图中心点坐标
        });

        // 创建测量工具
        measureTool = new TMap.tools.MeasureTool({
            map: map
        });
    }

    function measure() {
        document.getElementById('enable').className = 'active';
        document.getElementById('measure').className = 'active';
        document.getElementById('measure').innerText = '点击这里测量结束';
        measureTool.measureDistance().then((res) => {
            console.log(res);
            document.getElementById('enable').className = 'active';
            document.getElementById('measure').className = 'inactive';
            document.getElementById('measure').innerText = '点击这里开始测量';
        });
    }

    function enable(on) {
        if (on) {
            measureTool.enable();
            document.getElementById('enable').className = 'active';
            document.getElementById('disable').className = 'inactive';
        } else {
            measureTool.disable();
            document.getElementById('enable').className = 'inactive';
            document.getElementById('disable').className = 'active';
            document.getElementById('measure').className = 'inactive';
        }
    }
</script>