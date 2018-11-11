<?php
    use yii\helpers\Url;
    use backend\assets\UiLayAsset;
?>

<div class="layui-body layui-form top-50">
    <div class="layui-tab marg0" lay-filter="tab" id="top_tabs_box">
        <ul class="layui-tab-title top_tab" id="top_tabs">
            <li class="layui-this" lay-id=""><i class="iconfont">&#xe603;</i> <cite>后台首页</cite></li>
        </ul>
        <ul class="layui-nav closeBox">
          <li class="layui-nav-item">
            <a href="javascript:;"><i class="iconfont icon-dianji"></i>操作</a>
            <dl class="layui-nav-child">
              <dd><a href="javascript:;" class="refresh refreshThis"><i class="iconfont icon-refresh"></i> 刷新当前</a></dd>
              <dd><a href="javascript:;" class="closePageOther"><i class="iconfont icon-guanbi"></i> 关闭其他</a></dd>
              <dd><a href="javascript:;" class="closePageAll"><i class="iconfont icon-close"></i> 关闭全部</a></dd>
            </dl>
          </li>
        </ul>
        <div class="layui-tab-content clildFrame">
            <div class="layui-tab-item layui-show">
                <div id="LAY_preview">

                    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                        <legend>简约时间线：大事记</legend>
                    </fieldset>
                    <ul class="layui-timeline">
                        <li class="layui-timeline-item">
                            <i class="layui-icon layui-timeline-axis"></i>
                            <div class="layui-timeline-content layui-text">
                                <div class="layui-timeline-title">2018年 cms 发布简易版</div>
                            </div>
                        </li>
                        <li class="layui-timeline-item">
                            <i class="layui-icon layui-anim layui-anim-rotate layui-anim-loop layui-timeline-axis"></i>
                            <div class="layui-timeline-content layui-text">
                                <div class="layui-timeline-title">更久前，coding.....</div>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
  
