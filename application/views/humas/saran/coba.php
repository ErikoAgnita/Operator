
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Pagination.js | Home</title>
    <link href="css/base.css" rel="stylesheet">
    <link href="css/prettify.css" rel="stylesheet">
    <link href="dist/2.0.7/pagination.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

<a href="https://github.com/superRaytin/paginationjs">
    <img style="position: absolute; top: 0; right: 0; border: 0;" src="images/forkme_right_green_007200.png" alt="Fork me on GitHub">
</a>

<div class="topbar">
    <div class="inner">
        <ul class="clearfix">
            <li><a href="#" class="active">Home</a></li>
            <li><a href="docs/index.html">Docs</a></li>
            <li><a href="https://github.com/superRaytin/paginationjs" target="_blank">Fork on GitHub</a></li>
        </ul>
    </div>
</div>

<div class="header">
    <div class="title">Pagination.js<span>2.0.7</span></div>
    <div class="desc">
        A jQuery plugin to provide simple yet fully customisable pagination.<br>
        Almost all the ways you can think of on pagination.
    </div>
    <div class="download">
        <div class="build-buttons">
            <a class="build-button-source" href="dist/2.0.7/pagination.js">Pagination.js</a>
            <a class="build-button-zipped" href="dist/2.0.7/pagination.min.js">Pagination.min.js <span class="fileSize">12.4K</span></a>
        </div>
    </div>
</div>

<div class="wrapper">
    <div class="demo" id="J-demo">
        <div class="initialize">Initializing...</div>
    </div>
</div>

<div id="gototop">Top</div>


<script type="text/template" id="template-demo1">
    <div class="demo-section clearfix">
        <div class="demo-section-title"></div>
        <div class="inner-left preview">
            <div class="data-container"></div>
        </div>
        <div class="inner-right code">
<pre><code>$('#demo').pagination({
    dataSource: [1, 2, 3, 4, 5, 6, 7, ... , 195],
    callback: function(data, pagination) {
        // template method of yourself
        var html = template(data);
        dataContainer.html(html);
    }
})</code></pre>
        </div>
    </div>
</script>

<script type="text/template" id="template-demo2">
    <div class="demo-section clearfix">
        <div class="demo-section-title"></div>
        <div class="inner-left preview">
            <div class="data-container"></div>
        </div>
        <div class="inner-right code">
<pre><code>$('#demo').pagination({
    dataSource: [1, 2, 3, 4, 5, 6, 7, ... , 35],
    pageSize: 5,
    pageNumber: 3,
    callback: function(data, pagination) {
        // template method of yourself
        var html = template(data);
        dataContainer.html(html);
    }
})</code></pre>
        </div>
    </div>
</script>


<script type="text/template" id="template-demo3">
    <div class="demo-section clearfix">
        <div class="demo-section-title"></div>
        <div class="inner-left preview">
            <div class="data-container"></div>
        </div>
        <div class="inner-right code">
<pre><code>$('#demo').pagination({
    dataSource: 'https://api.flickr.com/services/feeds/photos_public.gne?tags=cat&tagmode=any&format=json&jsoncallback=?',
    locator: 'items',
    totalNumber: 120,
    pageSize: 20,
    ajax: {
        beforeSend: function() {
            dataContainer.html('Loading data from flickr.com ...');
        }
    },
    callback: function(data, pagination) {
        // template method of yourself
        var html = template(data);
        dataContainer.html(html);
    }
})</code></pre>
        </div>
    </div>
</script>

<script type="text/template" id="template-demo4">
    <div class="demo-section clearfix">
        <div class="demo-section-title"></div>
        <div class="inner-left preview">
            <div class="data-container"></div>
        </div>
        <div class="inner-right code">
<pre><code>$('#demo').pagination({
    dataSource: [1, 2, 3, 4, 5, 6, 7, ... , 15],
    pageSize: 5,
    showNavigator: true,
    formatNavigator: '&lt;span style="color: #f00"&gt;<%= currentPage %>&lt;/span&gt; st/rd/th, <%= totalPage %> pages, <%= totalNumber %> entries',
    position: 'top',
    callback: function(data, pagination) {
        // template method of yourself
        var html = template(data);
        dataContainer.html(html);
    }
})</code></pre>
        </div>
    </div>
</script>

<script type="text/template" id="template-demo5">
    <div class="demo-section clearfix">
        <div class="demo-section-title"></div>
        <div class="inner-left preview">
            <div class="data-container"></div>
        </div>
        <div class="inner-right code">
<pre><code>$('#demo').pagination({
    dataSource: [1, 2, 3, 4, 5, 6, 7, ... , 50],
    pageSize: 5,
    showPageNumbers: false,
    showNavigator: true,
    callback: function(data, pagination) {
        // template method of yourself
        var html = template(data);
        dataContainer.html(html);
    }
})</code></pre>
        </div>
    </div>
</script>

<script type="text/template" id="template-demo6">
    <div class="demo-section clearfix">
        <div class="demo-section-title"></div>
        <div class="inner-left preview">
            <div class="data-container"></div>
        </div>
        <div class="inner-right code">
<pre><code>$('#demo').pagination({
    dataSource: [1, 2, 3, 4, 5, 6, 7, ... , 100],
    pageSize: 8,
    formatResult: function(data) {
        var result = [];
        for (var i = 0, len = data.length; i < len; i++) {
            result.push(data[i] + ' - good guys');
        }
        return result;
    },
    callback: function(data, pagination) {
        // template method of yourself
        var html = template(data);
        dataContainer.html(html);
    }
})</code></pre>
        </div>
    </div>
</script>

<script type="text/template" id="template-demo9">
    <div class="demo-section clearfix">
        <div class="demo-section-title"></div>
        <div class="inner-left preview">
            <div class="data-container"></div>
        </div>
        <div class="inner-right code">
<pre><code>$('#demo').pagination({
    dataSource: [{a :1}, {a :2}, {a :3}, {a :4}, ... , {a :50}],
    pageSize: 8,
    formatResult: function(data) {
        for (var i = 0, len = data.length; i < len; i++) {
            data[i].a = data[i].a + ' - bad guys';
        }
    },
    callback: function(data, pagination) {
        // template method of yourself
        var html = template(data);
        dataContainer.html(html);
    }
})</code></pre>
        </div>
    </div>
</script>

<script type="text/template" id="template-demo7">
    <div class="demo-section clearfix">
        <div class="demo-section-title"></div>
        <div class="inner-left preview">
            <div class="data-container"></div>
        </div>
        <div class="inner-right code">
<pre><code>$('#demo').pagination({
    dataSource: [1, 2, 3, 4, 5, 6, 7, ... , 100],
    pageSize: 5,
    showPrevious: false,
    showNext: false,
    callback: function(data, pagination) {
        // template method of yourself
        var html = template(data);
        dataContainer.html(html);
    }
})</code></pre>
        </div>
    </div>
</script>

<script type="text/template" id="template-demo8">
    <div class="demo-section clearfix">
        <div class="demo-section-title"></div>
        <div class="inner-left preview">
            <div class="data-container"></div>
        </div>
        <div class="inner-right code">
<pre><code>$('#demo').pagination({
    dataSource: [1, 2, 3, 4, 5, 6, 7, ... , 40],
    pageSize: 5,
    showGoInput: true,
    showGoButton: true,
    callback: function(data, pagination) {
        // template method of yourself
        var html = template(data);
        dataContainer.html(html);
    }
})</code></pre>
        </div>
    </div>
</script>

<script type="text/template" id="template-demo10">
    <div class="demo-section clearfix">
        <div class="demo-section-title"></div>
        <div class="inner-left preview">
            <div class="data-container"></div>
        </div>
        <div class="inner-right code">
<pre><code>$('#demo').pagination({
    dataSource: [1, 2, 3, 4, 5, 6, 7, ... , 25],
    pageSize: 5,
    showGoInput: true,
    showGoButton: true,
    formatGoInput: 'go to <%= input %> st/rd/th',
    callback: function(data, pagination) {
        // template method of yourself
        var html = template(data);
        dataContainer.html(html);
    }
})</code></pre>
        </div>
    </div>
</script>

<script type="text/template" id="template-demo11">
    <div class="demo-section clearfix">
        <div class="demo-section-title"></div>
        <div class="inner-left preview" style="width: 51%">
            <div class="data-container"></div>
        </div>
        <div class="inner-right code" style="width: 46%">
            <div class="actions clearfix" id="J-actions">
                <span class="button" data-action="previous">Previous</span>
                <span class="button" data-action="next">Next</span>
                <span class="button" data-action="go" data-params="5">Go (5)</span>
                <span class="button" data-action="disable">Disable</span>
                <span class="button" data-action="enable">Enable</span>
                <span class="button" data-action="destroy">Destroy</span>
                <span class="button" data-action="show">Show</span>
                <span class="button" data-action="hide">Hide</span>
                <span class="button" data-action="isDisabled" data-type="get">is disabled?</span>
                <span class="button" data-action="getTotalPage" data-type="get">Total page</span>
                <span class="button" data-action="getSelectedPageNum" data-type="get">Selected page</span>
                <span class="button" data-action="getSelectedPageData" data-type="get">Selected page data</span>
            </div>
        </div>
    </div>
    <div class="demo-section clearfix">
        <div class="inner-left events-list">
            <div class="title">
                <label><input type="checkbox" id="J-checkAll" checked> Choose events to be logged:</label>
            </div>
            <div class="events-container" id="J-events-container">
                <div class="event-item">
                    <label>
                        <input type="checkbox" value="beforeInit"> beforeInit
                    </label>
                </div>
                <div class="event-item">
                    <label>
                        <input type="checkbox" value="beforeRender"> beforeRender
                    </label>
                </div>
            </div>
        </div>
        <div class="inner-right events-log">
            <div class="title">Events log <span class="button" id="J-log-clear">Clear</span></div>
            <ul class="log-container" id="J-log-container">

            </ul>
        </div>
    </div>
</script>

<script type="text/template" id="template-demo12">
    <div class="demo-section clearfix">
        <div class="demo-section-title"></div>
        <div class="inner-left preview">
            <div class="data-container"></div>
        </div>
        <div class="inner-right code">
<pre><code>$('#demo').pagination({
    dataSource: [1, 2, 3, 4, 5, 6, 7, ... , 35],
    pageSize: 5,
    autoHidePrevious: true,
    autoHideNext: true,
    callback: function(data, pagination) {
        // template method of yourself
        var html = template(data);
        dataContainer.html(html);
    }
})</code></pre>
        </div>
    </div>
</script>

<script type="text/template" id="template-demo">
    <div class="demo-section clearfix">
        <div class="demo-section-title"></div>
        <div class="inner-left preview">
            <div class="data-container"></div>
        </div>
        <div class="inner-right code">

        </div>
    </div>
</script>

<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="js/prettify.min.js"></script>
<script type="text/javascript" src="dist/2.0.7/pagination.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script type="text/javascript">
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-58588801-1', 'auto');
    ga('send', 'pageview');
</script>

</body>
</html>
