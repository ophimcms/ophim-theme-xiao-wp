<style>
    .myui-player__operate {
        justify-content: space-between;
        padding: 10px 10px !important;
        justify-items: center;
        flex-direction: row;
        align-items: center;
    }

    .myui-player__operate ul {
        display: flex;
    }

    .myui-player__operate>li>a.streaming-server {
        cursor: pointer;
        padding: 4px 8px;
        color: #fff;
        margin-bottom: 2px;
    }

    .myui-player__operate>li>a.streaming-server:hover {
        background: #ff9e11;
    }

    .myui-player__operate>li>a.streaming-server.active,
    .myui-content__list li a.active {
        background-color: #f90;
        background: linear-gradient(to right, #ff9900 0, #ff9f16 100%);
    }

    @media(max-width:767px) {
        #star img {
            width: 18px;
            height: 18px;
        }
    }

    @media(max-width:360px) {
        #star img {
            width: 16px;
            height: 16px;
        }
    }
</style>
<div class="myui-player clearfix" style="background-color: #27272f;">
    <div class="container">
        <div class="row">
            <div class="myui-player__item clearfix" style="background-color: #1f1f1f;">
                <div class="col-lg-wide-75 col-md-wide-65 clearfix padding-0 relative" id="player-left">
                    <div class="myui-player__box">
                        <div id="player-area" class="embed-responsive clearfix">

                        </div>
                    </div>
                    <ul class="myui-player__operate" style="background-color: #1b1a25;">
                        <li class="hidden-xs">Chọn nguồn phát hoặc tải lại trang khi lỗi</li>
                        <li>
                            <a data-id="<?= episodeName() ?>" data-link="<?= m3u8EpisodeUrl() ?>"
                               data-type="m3u8" onclick="chooseStreamingServer(this)"
                               class="btn btn-min btn-gray streaming-server">
                                <i class='icon-play'></i>
                                <span class='title'>Nguồn #1</span>
                                <span class='loader'></span>
                            </a>
                            <a data-id="<?= episodeName() ?>" data-link="<?= embedEpisodeUrl() ?>"
                               data-type="embed" onclick="chooseStreamingServer(this)"
                               class="btn btn-min btn-gray streaming-server">
                                <i class='icon-play'></i>
                                <span class='title'>Nguồn #2</span>
                                <span class='loader'></span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" onclick="window.location.reload()"><i class="fa fa-spinner"></i> Tải
                                lại trang</a>
                        </li>
                    </ul>
                    <style type="text/css">
                        .embed-responsive {
                            padding-bottom: 56.25%;
                        }
                    </style>
                    <a class="is-btn hidden-sm hidden-xs" id="player-sidebar-is" href="javascript:;"><i
                                class="fa fa-angle-right"></i></a>
                </div>
                <div class="col-lg-wide-25 col-md-wide-35 padding-0" id="player-sidebar">
                    <div class="myui-panel active clearfix">
                        <div class="myui-panel-box clearfix">
                            <div class="col-pd clearfix">
                                <div class="myui-panel__head active clearfix">
                                    <h3 class="title text-fff"><?php the_title(); ?>
                                        <small class="text-red">Tập <?= episodeName() ?></small>
                                    </h3>
                                </div>
                                <div class="box-rating">
                                    <input id="hint_current" type="hidden" value="">
                                    <input id="score_current" type="hidden"
                                           value="<?= op_get_rating() ?>">
                                    <div id="star" data-score="<?= op_get_rating() ?>"
                                         style="cursor: pointer; float: left; width: 200px;">
                                    </div>
                                    <span id="hint"></span>
                                    <div id="div_average" style="float:left; line-height:20px; margin:0 5px; ">(<span
                                                class="average" id="average"><?= op_get_rating() ?></span>
                                        đ/<span id="rate_count"> /
                                                <?= op_get_rating_count() ?></span> lượt)
                                    </div>
                                    <meta itemprop="aggregateRating" itemscope
                                          itemtype="https://schema.org/AggregateRating" />
                                    <meta itemprop="ratingValue" content="<?= op_get_rating() ?>" />
                                    <meta itemprop="ratingcount" content="<?= op_get_rating_count() ?>" />
                                    <meta itemprop="bestRating" content="10" />
                                    <meta itemprop="worstRating" content="1" />
                                </div>
                                <div class="text-muted">
                                    <ul class="nav nav-tabs pull-right">
                                        <li class="dropdown pb10 margin-0">
                                            <a href="javascript:;" class="padding-0 text-fff"
                                               data-toggle="dropdown">Chọn Server <i
                                                        class="fa fa-angle-down"></i></a>
                                            <div class="dropdown-box bottom">
                                                <ul class="item">
                                                    <?php foreach (episodeList() as $key => $server) : ?>
                                                    <li class="<? if($key == episodeSV() ) : ?> active <?php endif ;?>">
                                                        <a href="#player<?= $key ?>" tabindex="-1"
                                                           data-toggle="tab"><?= $server['server_name'] ?></a>
                                                    </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content mb10">
                                 <?php foreach (episodeList() as $key => $server) : ?>
                                <div id="player<?= $key ?>"
                                     class="tab-pane fade in <? if($key == episodeSV() ) : ?> active <?php endif ;?> clearfix">
                                    <ul class="myui-content__list playlist clearfix " id="playlist">
                                        <?php foreach ($server['server_data'] as $list) {
                                            $current = '';
                                            if (slugify($list['name']) == episodeName()&& episodeSV() == $key) {
                                                $current = 'active';
                                            }
                                            echo '
                                            <li class="col-lg-4 col-md-4 col-sm-5 col-xs-4 ' . $current . '"><a class="btn btn-min btn-gray' . $current . '" href="' . hrefEpisode($list["name"],$key) . '">
                                                ' . $list['name'] . '
                                            </a>  </li>
                                        ';
                                        } ?>
                                    </ul>
                                </div>
                                 <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="myui-player__data hidden-xs clearfix">
                <h1 class="title"><?php the_title(); ?></h1>
                <h2 class="font-18 text-muted"><?= op_get_original_title() ?></h2>
                <p class="data">
                    <span class="split-line"></span>
                    <span class="text-muted hidden-xs">Quốc gia: </span>
                    <?= op_get_regions(', ') ?>
                    <span class="split-line"></span>
                    <span class="text-muted hidden-xs">Năm sản xuất: </span>
                    <?= op_get_years() ?>
                    <span class="split-line"></span>
                    <span class="text-muted hidden-xs">Lượt xem: </span>
                    <i class="fa fa-eye"></i> <?= op_get_post_view() ?>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-wide-75 col-md-wide-7 col-xs-1 padding-0">
            <div class="myui-panel myui-panel-bg clearfix" id="desc">
                <div class="myui-panel-box clearfix">
                    <div class="myui-panel_hd">
                        <div class="myui-panel__head active bottom-line clearfix">
                            <h3 class="title">Thông tin</h3>
                        </div>
                    </div>
                    <div class="myui-panel_bd">
                        <div class="col-pd text-collapse content">
                            <p class="data">
                                <span class="text-muted">Thể loại: </span>
                                <?= op_get_genres(', ') ?>
                            </p>

                            <p>
                                <span class="text-muted">Đạo diễn: </span>
                                <?= op_get_directors(110,', ') ?>
                            </p>
                            <p>
                                <span class="text-muted">Diễn viên: </span>
                                @ <?= op_get_actors(100,', ') ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="myui-panel-box clearfix">
                <div class="myui-panel_bd">
                    <div class="myui-panel_hd">
                        <div class="myui-panel__head clearfix">
                            <h3 class="title">Bình luận</h3>
                        </div>
                    </div>
                    <div class="myui-panel_bd" style="background: #FFF">
                        <div class="fb-comments w-full" data-href="<?= getCurrentUrl() ?>" data-width="100%"
                 data-numposts="5" data-colorscheme="light" data-lazy="true">
            </div>
                    </div>
                </div>
            </div>

            <div class="myui-panel myui-panel-bg clearfix">
                <div class="myui-panel-box clearfix">
                    <div class="myui-panel_hd">
                        <div class="myui-panel__head active bottom-line clearfix">
                            <h3 class="title">Có thể bạn muốn xem</h3>
                        </div>
                    </div>
                    <div class="tab-content myui-panel_bd">
                        <ul id="actor" class="myui-vodlist__bd tab-pane fade in active clearfix">
                            <?php
                            $postType = 'ophim';
                            $taxonomyName = 'ophim_genres';
                            $taxonomy = get_the_terms(get_the_id(), $taxonomyName);
                            if ($taxonomy) {
                                $category_ids = array();
                                foreach ($taxonomy as $individual_category) $category_ids[] = $individual_category->term_id;
                                $args = array('post_type' => $postType, 'post__not_in' => array(get_the_id()), 'posts_per_page' => 12, 'tax_query' => array(array('taxonomy' => $taxonomyName, 'field' => 'term_id', 'terms' => $category_ids,),));
                                $my_query = new wp_query($args);

                                if ($my_query->have_posts()):
                                    while ($my_query->have_posts()):$my_query->the_post(); ?>
                                        <li class="col-lg-6 col-md-6 col-sm-4 col-xs-3">
                                            <?php  include THEMETEMPLADE.'/section/section_thumb_item.php';?>
                                        </li>
                                    <?php
                                    endwhile;
                                endif;
                                wp_reset_query();
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
add_action('wp_footer', function () {?>
    <script src="<?= get_template_directory_uri() ?>/assets/player/js/p2p-media-loader-core.min.js"></script>
    <script src="<?= get_template_directory_uri() ?>/assets/player/js/p2p-media-loader-hlsjs.min.js"></script>
    <?php op_jwpayer_js(); ?>
    <script>
        jQuery(document).ready(function() {
            jQuery('html, body').animate({
                scrollTop: jQuery('#player-area').offset().top
            }, 'slow');
        });
    </script>
    <script>
        var episode_id = '<?= episodeName() ?>';
        const wrapper = document.getElementById('player-area');
        const vastAds = "<?= get_option('ophim_jwplayer_advertising_file') ?>";

        function chooseStreamingServer(el) {
            const type = el.dataset.type;
            const link = el.dataset.link.replace(/^http:\/\//i, 'https://');
            const id = el.dataset.id;

            episode_id = id;


            Array.from(document.getElementsByClassName('streaming-server')).forEach(server => {
                server.classList.remove('active');
            })
            el.classList.add('active');

            renderPlayer(type, link, id);
        }

        function renderPlayer(type, link, id) {
            if (type == 'embed') {
                if (vastAds) {
                    wrapper.innerHTML = `<div id="fake_jwplayer"></div>`;
                    const fake_player = jwplayer("fake_jwplayer");
                    const objSetupFake = {
                        key: "<?= get_option('ophim_jwplayer_license', 'ITWMv7t88JGzI0xPwW8I0+LveiXX9SWbfdmt0ArUSyc=') ?>",
                        aspectratio: "16:9",
                        width: "100%",
                        file: "<?= get_template_directory_uri() ?>/assets/player/1s_blank.mp4",
                        volume: 100,
                        mute: false,
                        autostart: true,
                        advertising: {
                            tag: "<?= get_option('ophim_jwplayer_advertising_file') ?>",
                            client: "vast",
                            vpaidmode: "insecure",
                            skipoffset: <?= get_option('ophim_jwplayer_advertising_skipoffset') ?:  5 ?>, // Bỏ qua quảng cáo trong vòng 5 giây
                            skipmessage: "Bỏ qua sau xx giây",
                            skiptext: "Bỏ qua"
                        }
                    };
                    fake_player.setup(objSetupFake);
                    fake_player.on('complete', function(event) {
                        $("#fake_jwplayer").remove();
                        wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                        fake_player.remove();
                    });

                    fake_player.on('adSkipped', function(event) {
                        $("#fake_jwplayer").remove();
                        wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                        fake_player.remove();
                    });

                    fake_player.on('adComplete', function(event) {
                        $("#fake_jwplayer").remove();
                        wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                        fake_player.remove();
                    });
                } else {
                    if (wrapper) {
                        wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                    }
                }
                return;
            }

            if (type == 'm3u8' || type == 'mp4') {
                wrapper.innerHTML = `<div id="jwplayer"></div>`;
                const player = jwplayer("jwplayer");
                const objSetup = {
                    key: "<?= get_option('ophim_jwplayer_license', 'ITWMv7t88JGzI0xPwW8I0+LveiXX9SWbfdmt0ArUSyc=') ?>",
                    aspectratio: "16:9",
                    width: "100%",
                    image: "<?= op_get_poster_url() ?>",
                    file: link,
                    playbackRateControls: true,
                    playbackRates: [0.25, 0.75, 1, 1.25],
                    sharing: {
                        sites: [
                            "reddit",
                            "facebook",
                            "twitter",
                            "googleplus",
                            "email",
                            "linkedin",
                        ],
                    },
                    volume: 100,
                    mute: false,
                    autostart: true,
                    logo: {
                        file: "<?= get_option('ophim_jwplayer_logo_file') ?>",
                        link: "<?= get_option('ophim_jwplayer_logo_link') ?>",
                        position: "<?= get_option('ophim_jwplayer_logo_position') ?>",
                    },
                    advertising: {
                        tag: "<?= get_option('ophim_jwplayer_advertising_file') ?>",
                        client: "vast",
                        vpaidmode: "insecure",
                        skipoffset: <?= get_option('ophim_jwplayer_advertising_skipoffset') ?:  5 ?>, // Bỏ qua quảng cáo trong vòng 5 giây
                        skipmessage: "Bỏ qua sau xx giây",
                        skiptext: "Bỏ qua"
                    }
                };

                if (type == 'm3u8') {
                    const segments_in_queue = 50;

                    var engine_config = {
                        debug: !1,
                        segments: {
                            forwardSegmentCount: 50,
                        },
                        loader: {
                            cachedSegmentExpiration: 864e5,
                            cachedSegmentsCount: 1e3,
                            requiredSegmentsPriority: segments_in_queue,
                            httpDownloadMaxPriority: 9,
                            httpDownloadProbability: 0.06,
                            httpDownloadProbabilityInterval: 1e3,
                            httpDownloadProbabilitySkipIfNoPeers: !0,
                            p2pDownloadMaxPriority: 50,
                            httpFailedSegmentTimeout: 500,
                            simultaneousP2PDownloads: 20,
                            simultaneousHttpDownloads: 2,
                            // httpDownloadInitialTimeout: 12e4,
                            // httpDownloadInitialTimeoutPerSegment: 17e3,
                            httpDownloadInitialTimeout: 0,
                            httpDownloadInitialTimeoutPerSegment: 17e3,
                            httpUseRanges: !0,
                            maxBufferLength: 300,
                            // useP2P: false,
                        },
                    };
                    if (Hls.isSupported() && p2pml.hlsjs.Engine.isSupported()) {
                        var engine = new p2pml.hlsjs.Engine(engine_config);
                        player.setup(objSetup);
                        jwplayer_hls_provider.attach();
                        p2pml.hlsjs.initJwPlayer(player, {
                            liveSyncDurationCount: segments_in_queue, // To have at least 7 segments in queue
                            maxBufferLength: 300,
                            loader: engine.createLoaderClass(),
                        });
                    } else {
                        player.setup(objSetup);
                    }
                } else {
                    player.setup(objSetup);
                }


                const resumeData = 'OPCMS-PlayerPosition-' + id;
                player.on('ready', function() {
                    if (typeof(Storage) !== 'undefined') {
                        if (localStorage[resumeData] == '' || localStorage[resumeData] == 'undefined') {
                            console.log("No cookie for position found");
                            var currentPosition = 0;
                        } else {
                            if (localStorage[resumeData] == "null") {
                                localStorage[resumeData] = 0;
                            } else {
                                var currentPosition = localStorage[resumeData];
                            }
                            console.log("Position cookie found: " + localStorage[resumeData]);
                        }
                        player.once('play', function() {
                            console.log('Checking position cookie!');
                            console.log(Math.abs(player.getDuration() - currentPosition));
                            if (currentPosition > 180 && Math.abs(player.getDuration() - currentPosition) >
                                5) {
                                player.seek(currentPosition);
                            }
                        });
                        window.onunload = function() {
                            localStorage[resumeData] = player.getPosition();
                        }
                    } else {
                        console.log('Your browser is too old!');
                    }
                });

                player.on('complete', function() {
                    <?php if(nextEpisodeUrl()){ ?>
                    window.location.href = "<?= nextEpisodeUrl() ?>";
                    <?php }?>
                    if (typeof(Storage) !== 'undefined') {
                        localStorage.removeItem(resumeData);
                    } else {
                        console.log('Your browser is too old!');
                    }
                })

                function formatSeconds(seconds) {
                    var date = new Date(1970, 0, 1);
                    date.setSeconds(seconds);
                    return date.toTimeString().replace(/.*(\d{2}:\d{2}:\d{2}).*/, "$1");
                }
            }
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const episode = '<?= episodeName() ?>';
            let playing = document.querySelector(`[data-id="${episode}"]`);
            if (playing) {
                playing.click();
                return;
            }

            const servers = document.getElementsByClassName('streaming-server');
            if (servers[0]) {
                servers[0].click();
            }
        });
    </script>

    <link href="<?= get_template_directory_uri() ?>/assets/libs/jquery-raty/jquery.raty.css" rel="stylesheet" />
    <script src="<?= get_template_directory_uri() ?>/assets/libs/jquery-raty/jquery.raty.js"></script>

    <script>
        var rated = false;
        jQuery(document).ready(function($) {
            $('#star').raty({
                number: 10,
                starHalf: '<?= get_template_directory_uri() ?>/assets/libs/jquery-raty/images/star-half.png',
                starOff: '<?= get_template_directory_uri() ?>/assets/libs/jquery-raty/images/star-off.png',
                starOn: '<?= get_template_directory_uri() ?>/assets/libs/jquery-raty/images/star-on.png',
                click: function(score, evt) {
                    if (!rated) {
                        $.ajax({
                            url: '<?php echo admin_url('admin-ajax.php')?>',
                            type: 'POST',
                            data:{
                                action: "ratemovie",
                                rating: score,
                                postid: '<?php echo get_the_ID(); ?>',
                            },
                        }).done(function (data) {
                            layer.msg(
                                "Đánh giá của bạn đã được gửi đi.",
                                {
                                    anim: 5,
                                    time: 3000,
                                },
                                function () {
                                }
                            );
                            rated = true;
                        });
                    }
                }
            });
        })
    </script>
<?php }) ?>