<?php
$listFindCourse = isset($this->listFindCourse) ? $this->listFindCourse : [];
$url = [
    "find" => URL::createLink("default", "index", "find", null, "tim-kiem.html")
];
?>
<section id="after-slider" class="after-slider section">
    <form action="" method="post" id="adminForm">
        <div class="awe-color bg-color-1"></div>
        <div class="after-slider-bg-2"></div>
        <div class="container">

            <div class="after-slider-content tb">
                <div class="inner tb-cell">
                    <h4>Tìm kiếm</h4>
                    <div class="course-keyword">
                        <input type="text" placeholder="Nhập từ khóa" name="form[search]" id="tags">
                    </div>
                    <!--                    <div class="mc-select-wrap">-->
                    <!--                        <div class="mc-select">-->
                    <!--                            <select class="select" name="form[find]" id="all-categories">-->
                    <!--                                <option value="0" selected>Tất cả categories</option>-->
                    <!--                                --><?php //foreach ($listFindCourse as $value) { ?>
                    <!--                                    <option value="--><?php //echo $value['id'] ?><!--"-->
                    <!--                                            name="form[find]">-->
                    <?php //echo $value['name'] ?><!--</option>-->
                    <!--                                --><?php //} ?>
                    <!--                            </select>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                </div>
                <div class="tb-cell text-right">
                    <div class="form-actions">
                        <input type="button" value="Tìm Kiếm" class="mc-btn btn-style-1"
                               onclick="javascript:submitForm('<?php echo $url['find'] ?>')"
                        >
                    </div>
                </div>
            </div>

        </div>
    </form>
</section>
<script>
    $(function () {
        var teams = [
            {value: 'Chicago Blackhawks', data: {category: 'NHL'}},
            {value: 'Chicago Bulls', data: {category: 'NBA'}}
        ];
//        $('#tags').devbridgeAutocomplete({
//            lookup: teams,
//            minChars: 1,
//            groupBy: 'category'
////        });
//        $('#tags').autocomplete({
//            source: function (request, response) {
//                $.ajax({
//                    url: ROOT_URL + 'index.php?module=default&controller=index&action=findAutocomlete',
//                    type: 'POST',
//                    dataType: "json",
//                    data: {param: request.term},
//                    success: function (data) {
//                        console.log(data);
//                        response(data);
//                        $('#tags').devbridgeAutocomplete({
//                            lookup: teams,
//                            minChars: 1,
//                            groupBy: 'category'
//                        });
//                    }
//                })
//            },
//        });
//        setSearch();
        setSearch();
        // Initialize autocomplete with local lookup:
//
                $('#tags').keyup(function () {
                    $.ajax({
                        url: ROOT_URL + 'index.php?module=default&controller=index&action=findAutocomlete',
                        type: 'POST',
                        dataType: "json",
                        data: {param: this.value},
                        success: function (data) {
                            $("#tags").catcomplete({
                                delay: 0,
                                source: data
                            });

                        },
                    })
                })
    });

    function getValInput() {
        var nhlTeams = ['Anaheim Ducks', 'Atlanta Thrashers', 'Boston Bruins', 'Buffalo Sabres', 'Calgary Flames', 'Carolina Hurricanes', 'Chicago Blackhawks', 'Colorado Avalanche', 'Columbus Blue Jackets', 'Dallas Stars', 'Detroit Red Wings', 'Edmonton OIlers', 'Florida Panthers', 'Los Angeles Kings', 'Minnesota Wild', 'Montreal Canadiens', 'Nashville Predators', 'New Jersey Devils', 'New Rork Islanders', 'New York Rangers', 'Ottawa Senators', 'Philadelphia Flyers', 'Phoenix Coyotes', 'Pittsburgh Penguins', 'Saint Louis Blues', 'San Jose Sharks', 'Tampa Bay Lightning', 'Toronto Maple Leafs', 'Vancouver Canucks', 'Washington Capitals'];
        var nbaTeams = ['Atlanta Hawks', 'Boston Celtics', 'Charlotte Bobcats', 'Chicago Bulls', 'Cleveland Cavaliers', 'Dallas Mavericks', 'Denver Nuggets', 'Detroit Pistons', 'Golden State Warriors', 'Houston Rockets', 'Indiana Pacers', 'LA Clippers', 'LA Lakers', 'Memphis Grizzlies', 'Miami Heat', 'Milwaukee Bucks', 'Minnesota Timberwolves', 'New Jersey Nets', 'New Orleans Hornets', 'New York Knicks', 'Oklahoma City Thunder', 'Orlando Magic', 'Philadelphia Sixers', 'Phoenix Suns', 'Portland Trail Blazers', 'Sacramento Kings', 'San Antonio Spurs', 'Toronto Raptors', 'Utah Jazz', 'Washington Wizards'];
        var nhl = $.map(nhlTeams, function (team) {
            return {value: team, data: {category: 'NHL'}};
        });
        var nba = $.map(nbaTeams, function (team) {
            return {value: team, data: {category: 'NBA'}};
        });
        var teams = nhl.concat(nba);
        console.log(teams);
        $('#tags').devbridgeAutocomplete({
            lookup: teams,
            minChars: 1,
            groupBy: 'category'
        });
    }

    function setSearch() {
        $.widget("custom.catcomplete", $.ui.autocomplete, {
            _create: function () {
                this._super();
                this.widget().menu("option", "items", "> :not(.ui-autocomplete-category)");
            },
            _renderMenu: function (ul, items) {
                var that = this,
                    currentCategory = "";
                $.each(items, function (index, item) {
                    var li;
                    if (item.category != currentCategory) {
                        ul.append("<li class='ui-autocomplete-category'>" + item.category + "</li>");
                        currentCategory = item.category;
                    }
                    li = that._renderItemData(ul, item);
                    if (item.category) {
                        li.attr("aria-label", item.category + " : " + item.label);
                    }
                });
            }
        });
    }

    function getAjax(val) {
        $.ajax({
            url: ROOT_URL + 'index.php?module=default&controller=index&action=findAutocomlete',
            type: 'POST',
            dataType: "json",
            data: {param: val},
            success: function (data) {
                console.log(data);
                return data;
            }
        })
    }
</script>

