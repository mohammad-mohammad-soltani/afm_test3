<?php

require_once(header);
?>
<div class="bg-dark card">
    <div class="card-header">
        <h5>تولید نمودار (CHART)</h5>
        <span>این قابلیت فعلا تنها از نمودار ستونی پشتیبانی میکند</span>
        <br>
        <span>همچنین این قابلیت فعلا تنها از یک نوع ستون پشتیبانی میکند</span>
    </div>
    <div class="card-inner">
        <div class="row">
            <!-- col 1 -->
            <div class="col-6">
                <div>
                    <label >عنوان نمودار</label>
                    <input type="text" class="form-control" placeholder="عنوان نمودار (دیتای آنالیز شده) " id="chart_title">
                </div>
                <br>
                <div>
                    <label>اسامی</label>
                    <br>
                    <span>مقادیر را با علامت - جدا نمایید . <br>نکته : تعداد مقادیر با نام ستون ها باید برابری کند</span>
                    <input type="text" class="form-control" placeholder="عنوان جدول" id="cols_name">
                </div>
                <br>
                <div>
                    <label >مقدار ها </label>
                    <br>
                    <span>مقادیر را با علامت - جدا نمایید . <br>نکته : تعداد نام ستون ها با مقادیر  باید برابری کند</span>
                    <input type="text" class="form-control" placeholder="عنوان جدول" id="cols_value">
                </div>
                <br>
                <div class="col-12 row">
                    
                    <button type="button" id="create_chart" class="btn btn-primary col-6 mx-auto"><span class="text-center"><strong>تولید نمودار</strong></span></button>
                </div>
            </div>
            <!-- col 2 -->
            <div class="col-6" id="img-box">
                
            </div>
        </div>
    </div>
</div>

<script src="<?php echo url."chart/chartscript.js" ?>"></script>
<?php
require_once(footer);