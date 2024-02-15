<?php
include_once 'db.inc.php';

if (isset($_COOKIE['discord_access_token'])) {
  $access_token = $_COOKIE['discord_access_token'];

  $user_info_url = 'https://discord.com/api/users/@me';
  $user_info_headers = array(
    'Authorization: Bearer ' . $access_token
  );

  $user_info_context = stream_context_create(
    array(
      'http' => array(
        'header' => $user_info_headers,
      ),
    )
  );

  $user_info_result = file_get_contents($user_info_url, false, $user_info_context);

  if ($user_info_result !== false) {
    $user_info = json_decode($user_info_result, true);
    $username = $user_info['username'];
    $userid = $user_info['id'];
    $usersavatar = $user_info['avatar'];

    $sql = "SELECT civilianPermissions FROM mdtPermissions WHERE accountIdentifier = $userid";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      $row = mysqli_fetch_assoc($result);
      $hasCivilianPerms = $row['civilianPermissions'];

      if ($hasCivilianPerms === 'Yes') {
        //
      } else {
        header("Location: mdtLoggedIn.php");
        exit;
      }
    }
  } else {
    $username = 'Unable to fetch username';
    $userid = 'Unable to fetch userid';
    $usersavatar = 'Unable to fetch user avatar';
  }
} else {
  header("Location: mdtLogin.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <title>c-mdt-civilianSelected &#8211;Cali-Coast</title>
        <meta name='robots' content='max-image-preview:large'/>
        <link rel='dns-prefetch' href='//stats.wp.com'/>
        <link rel="alternate" type="application/rss+xml" title="Cali-Coast &raquo; Feed" href="https://wp.fivesync.co.uk/feed/"/>
        <link rel="alternate" type="application/rss+xml" title="Cali-Coast &raquo; Comments Feed" href="https://wp.fivesync.co.uk/comments/feed/"/>
        <script>
            window._wpemojiSettings = {
                "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/72x72\/",
                "ext": ".png",
                "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/svg\/",
                "svgExt": ".svg",
                "source": {
                    "concatemoji": "https:\/\/wp.fivesync.co.uk\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.4.3"
                }
            };
            /*! This file is auto-generated */
            !function(i, n) {
                var o, s, e;
                function c(e) {
                    try {
                        var t = {
                            supportTests: e,
                            timestamp: (new Date).valueOf()
                        };
                        sessionStorage.setItem(o, JSON.stringify(t))
                    } catch (e) {}
                }
                function p(e, t, n) {
                    e.clearRect(0, 0, e.canvas.width, e.canvas.height),
                    e.fillText(t, 0, 0);
                    var t = new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data)
                      , r = (e.clearRect(0, 0, e.canvas.width, e.canvas.height),
                    e.fillText(n, 0, 0),
                    new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data));
                    return t.every(function(e, t) {
                        return e === r[t]
                    })
                }
                function u(e, t, n) {
                    switch (t) {
                    case "flag":
                        return n(e, "\ud83c\udff3\ufe0f\u200d\u26a7\ufe0f", "\ud83c\udff3\ufe0f\u200b\u26a7\ufe0f") ? !1 : !n(e, "\ud83c\uddfa\ud83c\uddf3", "\ud83c\uddfa\u200b\ud83c\uddf3") && !n(e, "\ud83c\udff4\udb40\udc67\udb40\udc62\udb40\udc65\udb40\udc6e\udb40\udc67\udb40\udc7f", "\ud83c\udff4\u200b\udb40\udc67\u200b\udb40\udc62\u200b\udb40\udc65\u200b\udb40\udc6e\u200b\udb40\udc67\u200b\udb40\udc7f");
                    case "emoji":
                        return !n(e, "\ud83e\udef1\ud83c\udffb\u200d\ud83e\udef2\ud83c\udfff", "\ud83e\udef1\ud83c\udffb\u200b\ud83e\udef2\ud83c\udfff")
                    }
                    return !1
                }
                function f(e, t, n) {
                    var r = "undefined" != typeof WorkerGlobalScope && self instanceof WorkerGlobalScope ? new OffscreenCanvas(300,150) : i.createElement("canvas")
                      , a = r.getContext("2d", {
                        willReadFrequently: !0
                    })
                      , o = (a.textBaseline = "top",
                    a.font = "600 32px Arial",
                    {});
                    return e.forEach(function(e) {
                        o[e] = t(a, e, n)
                    }),
                    o
                }
                function t(e) {
                    var t = i.createElement("script");
                    t.src = e,
                    t.defer = !0,
                    i.head.appendChild(t)
                }
                "undefined" != typeof Promise && (o = "wpEmojiSettingsSupports",
                s = ["flag", "emoji"],
                n.supports = {
                    everything: !0,
                    everythingExceptFlag: !0
                },
                e = new Promise(function(e) {
                    i.addEventListener("DOMContentLoaded", e, {
                        once: !0
                    })
                }
                ),
                new Promise(function(t) {
                    var n = function() {
                        try {
                            var e = JSON.parse(sessionStorage.getItem(o));
                            if ("object" == typeof e && "number" == typeof e.timestamp && (new Date).valueOf() < e.timestamp + 604800 && "object" == typeof e.supportTests)
                                return e.supportTests
                        } catch (e) {}
                        return null
                    }();
                    if (!n) {
                        if ("undefined" != typeof Worker && "undefined" != typeof OffscreenCanvas && "undefined" != typeof URL && URL.createObjectURL && "undefined" != typeof Blob)
                            try {
                                var e = "postMessage(" + f.toString() + "(" + [JSON.stringify(s), u.toString(), p.toString()].join(",") + "));"
                                  , r = new Blob([e],{
                                    type: "text/javascript"
                                })
                                  , a = new Worker(URL.createObjectURL(r),{
                                    name: "wpTestEmojiSupports"
                                });
                                return void (a.onmessage = function(e) {
                                    c(n = e.data),
                                    a.terminate(),
                                    t(n)
                                }
                                )
                            } catch (e) {}
                        c(n = f(s, u, p))
                    }
                    t(n)
                }
                ).then(function(e) {
                    for (var t in e)
                        n.supports[t] = e[t],
                        n.supports.everything = n.supports.everything && n.supports[t],
                        "flag" !== t && (n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && n.supports[t]);
                    n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && !n.supports.flag,
                    n.DOMReady = !1,
                    n.readyCallback = function() {
                        n.DOMReady = !0
                    }
                }).then(function() {
                    return e
                }).then(function() {
                    var e;
                    n.supports.everything || (n.readyCallback(),
                    (e = n.source || {}).concatemoji ? t(e.concatemoji) : e.wpemoji && e.twemoji && (t(e.twemoji),
                    t(e.wpemoji)))
                }))
            }((window,
            document), window._wpemojiSettings);
        </script>
        <link rel='stylesheet' id='formidable-css' href='./mdtCivilianSelected/css/formidable-css-formidableforms.css' media='all'/>
        <style id='wp-emoji-styles-inline-css'>
            img.wp-smiley, img.emoji {
                display: inline !important;
                border: none !important;
                box-shadow: none !important;
                height: 1em !important;
                width: 1em !important;
                margin: 0 0.07em !important;
                vertical-align: -0.1em !important;
                background: none !important;
                padding: 0 !important;
            }
        </style>
        <link rel='stylesheet' id='wc-blocks-vendors-style-css' href='./mdtCivilianSelected/css/woocommerce-packages-woocommerce-blocks-build-wc-blocks-vendors-style.css' media='all'/>
        <link rel='stylesheet' id='wc-all-blocks-style-css' href='./mdtCivilianSelected/css/woocommerce-packages-woocommerce-blocks-build-wc-all-blocks-style.css' media='all'/>
        <style id='classic-theme-styles-inline-css'>
            /*! This file is auto-generated */
            .wp-block-button__link {
                color: #fff;
                background-color: #32373c;
                border-radius: 9999px;
                box-shadow: none;
                text-decoration: none;
                padding: calc(.667em + 2px) calc(1.333em + 2px);
                font-size: 1.125em
            }

            .wp-block-file__button {
                background: #32373c;
                color: #fff;
                text-decoration: none
            }
        </style>
        <style id='global-styles-inline-css'>
            body {
                --wp--preset--color--black: #000000;
                --wp--preset--color--cyan-bluish-gray: #abb8c3;
                --wp--preset--color--white: #ffffff;
                --wp--preset--color--pale-pink: #f78da7;
                --wp--preset--color--vivid-red: #cf2e2e;
                --wp--preset--color--luminous-vivid-orange: #ff6900;
                --wp--preset--color--luminous-vivid-amber: #fcb900;
                --wp--preset--color--light-green-cyan: #7bdcb5;
                --wp--preset--color--vivid-green-cyan: #00d084;
                --wp--preset--color--pale-cyan-blue: #8ed1fc;
                --wp--preset--color--vivid-cyan-blue: #0693e3;
                --wp--preset--color--vivid-purple: #9b51e0;
                --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%);
                --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%);
                --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%);
                --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%);
                --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%);
                --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%);
                --wp--preset--gradient--blush-light-purple: linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%);
                --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%);
                --wp--preset--gradient--luminous-dusk: linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%);
                --wp--preset--gradient--pale-ocean: linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%);
                --wp--preset--gradient--electric-grass: linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%);
                --wp--preset--gradient--midnight: linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%);
                --wp--preset--font-size--small: 13px;
                --wp--preset--font-size--medium: 20px;
                --wp--preset--font-size--large: 36px;
                --wp--preset--font-size--x-large: 42px;
                --wp--preset--spacing--20: 0.44rem;
                --wp--preset--spacing--30: 0.67rem;
                --wp--preset--spacing--40: 1rem;
                --wp--preset--spacing--50: 1.5rem;
                --wp--preset--spacing--60: 2.25rem;
                --wp--preset--spacing--70: 3.38rem;
                --wp--preset--spacing--80: 5.06rem;
                --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
                --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
                --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
                --wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
                --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
            }

            :where(.is-layout-flex) {
                gap: 0.5em;
            }

            :where(.is-layout-grid) {
                gap: 0.5em;
            }

            body .is-layout-flow > .alignleft {
                float: left;
                margin-inline-start: 0;margin-inline-end: 2em;}

            body .is-layout-flow > .alignright {
                float: right;
                margin-inline-start: 2em;margin-inline-end: 0;}

            body .is-layout-flow > .aligncenter {
                margin-left: auto !important;
                margin-right: auto !important;
            }

            body .is-layout-constrained > .alignleft {
                float: left;
                margin-inline-start: 0;margin-inline-end: 2em;}

            body .is-layout-constrained > .alignright {
                float: right;
                margin-inline-start: 2em;margin-inline-end: 0;}

            body .is-layout-constrained > .aligncenter {
                margin-left: auto !important;
                margin-right: auto !important;
            }

            body .is-layout-constrained > :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
                max-width: var(--wp--style--global--content-size);
                margin-left: auto !important;
                margin-right: auto !important;
            }

            body .is-layout-constrained > .alignwide {
                max-width: var(--wp--style--global--wide-size);
            }

            body .is-layout-flex {
                display: flex;
            }

            body .is-layout-flex {
                flex-wrap: wrap;
                align-items: center;
            }

            body .is-layout-flex > * {
                margin: 0;
            }

            body .is-layout-grid {
                display: grid;
            }

            body .is-layout-grid > * {
                margin: 0;
            }

            :where(.wp-block-columns.is-layout-flex) {
                gap: 2em;
            }

            :where(.wp-block-columns.is-layout-grid) {
                gap: 2em;
            }

            :where(.wp-block-post-template.is-layout-flex) {
                gap: 1.25em;
            }

            :where(.wp-block-post-template.is-layout-grid) {
                gap: 1.25em;
            }

            .has-black-color {
                color: var(--wp--preset--color--black) !important;
            }

            .has-cyan-bluish-gray-color {
                color: var(--wp--preset--color--cyan-bluish-gray) !important;
            }

            .has-white-color {
                color: var(--wp--preset--color--white) !important;
            }

            .has-pale-pink-color {
                color: var(--wp--preset--color--pale-pink) !important;
            }

            .has-vivid-red-color {
                color: var(--wp--preset--color--vivid-red) !important;
            }

            .has-luminous-vivid-orange-color {
                color: var(--wp--preset--color--luminous-vivid-orange) !important;
            }

            .has-luminous-vivid-amber-color {
                color: var(--wp--preset--color--luminous-vivid-amber) !important;
            }

            .has-light-green-cyan-color {
                color: var(--wp--preset--color--light-green-cyan) !important;
            }

            .has-vivid-green-cyan-color {
                color: var(--wp--preset--color--vivid-green-cyan) !important;
            }

            .has-pale-cyan-blue-color {
                color: var(--wp--preset--color--pale-cyan-blue) !important;
            }

            .has-vivid-cyan-blue-color {
                color: var(--wp--preset--color--vivid-cyan-blue) !important;
            }

            .has-vivid-purple-color {
                color: var(--wp--preset--color--vivid-purple) !important;
            }

            .has-black-background-color {
                background-color: var(--wp--preset--color--black) !important;
            }

            .has-cyan-bluish-gray-background-color {
                background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
            }

            .has-white-background-color {
                background-color: var(--wp--preset--color--white) !important;
            }

            .has-pale-pink-background-color {
                background-color: var(--wp--preset--color--pale-pink) !important;
            }

            .has-vivid-red-background-color {
                background-color: var(--wp--preset--color--vivid-red) !important;
            }

            .has-luminous-vivid-orange-background-color {
                background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
            }

            .has-luminous-vivid-amber-background-color {
                background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
            }

            .has-light-green-cyan-background-color {
                background-color: var(--wp--preset--color--light-green-cyan) !important;
            }

            .has-vivid-green-cyan-background-color {
                background-color: var(--wp--preset--color--vivid-green-cyan) !important;
            }

            .has-pale-cyan-blue-background-color {
                background-color: var(--wp--preset--color--pale-cyan-blue) !important;
            }

            .has-vivid-cyan-blue-background-color {
                background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
            }

            .has-vivid-purple-background-color {
                background-color: var(--wp--preset--color--vivid-purple) !important;
            }

            .has-black-border-color {
                border-color: var(--wp--preset--color--black) !important;
            }

            .has-cyan-bluish-gray-border-color {
                border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
            }

            .has-white-border-color {
                border-color: var(--wp--preset--color--white) !important;
            }

            .has-pale-pink-border-color {
                border-color: var(--wp--preset--color--pale-pink) !important;
            }

            .has-vivid-red-border-color {
                border-color: var(--wp--preset--color--vivid-red) !important;
            }

            .has-luminous-vivid-orange-border-color {
                border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
            }

            .has-luminous-vivid-amber-border-color {
                border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
            }

            .has-light-green-cyan-border-color {
                border-color: var(--wp--preset--color--light-green-cyan) !important;
            }

            .has-vivid-green-cyan-border-color {
                border-color: var(--wp--preset--color--vivid-green-cyan) !important;
            }

            .has-pale-cyan-blue-border-color {
                border-color: var(--wp--preset--color--pale-cyan-blue) !important;
            }

            .has-vivid-cyan-blue-border-color {
                border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
            }

            .has-vivid-purple-border-color {
                border-color: var(--wp--preset--color--vivid-purple) !important;
            }

            .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
                background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
            }

            .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
                background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
            }

            .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
                background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
            }

            .has-luminous-vivid-orange-to-vivid-red-gradient-background {
                background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
            }

            .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
                background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
            }

            .has-cool-to-warm-spectrum-gradient-background {
                background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
            }

            .has-blush-light-purple-gradient-background {
                background: var(--wp--preset--gradient--blush-light-purple) !important;
            }

            .has-blush-bordeaux-gradient-background {
                background: var(--wp--preset--gradient--blush-bordeaux) !important;
            }

            .has-luminous-dusk-gradient-background {
                background: var(--wp--preset--gradient--luminous-dusk) !important;
            }

            .has-pale-ocean-gradient-background {
                background: var(--wp--preset--gradient--pale-ocean) !important;
            }

            .has-electric-grass-gradient-background {
                background: var(--wp--preset--gradient--electric-grass) !important;
            }

            .has-midnight-gradient-background {
                background: var(--wp--preset--gradient--midnight) !important;
            }

            .has-small-font-size {
                font-size: var(--wp--preset--font-size--small) !important;
            }

            .has-medium-font-size {
                font-size: var(--wp--preset--font-size--medium) !important;
            }

            .has-large-font-size {
                font-size: var(--wp--preset--font-size--large) !important;
            }

            .has-x-large-font-size {
                font-size: var(--wp--preset--font-size--x-large) !important;
            }

            .wp-block-navigation a:where(:not(.wp-element-button)) {
                color: inherit;
            }

            :where(.wp-block-post-template.is-layout-flex) {
                gap: 1.25em;
            }

            :where(.wp-block-post-template.is-layout-grid) {
                gap: 1.25em;
            }

            :where(.wp-block-columns.is-layout-flex) {
                gap: 2em;
            }

            :where(.wp-block-columns.is-layout-grid) {
                gap: 2em;
            }

            .wp-block-pullquote {
                font-size: 1.5em;
                line-height: 1.6;
            }
        </style>
        <link rel='stylesheet' id='woocommerce-layout-css' href='./mdtCivilianSelected/css/woocommerce-assets-css-woocommerce-layout.css' media='all'/>
        <link rel='stylesheet' id='woocommerce-smallscreen-css' href='./mdtCivilianSelected/css/woocommerce-assets-css-woocommerce-smallscreen.css' media='only screen and (max-width: 768px)'/>
        <link rel='stylesheet' id='woocommerce-general-css' href='./mdtCivilianSelected/css/woocommerce-assets-css-woocommerce.css' media='all'/>
        <style id='woocommerce-inline-inline-css'>
            .woocommerce form .form-row .required {
                visibility: visible;
            }
        </style>
        <link rel='stylesheet' id='wpda_wpdp_public-css' href='./mdtCivilianSelected/css/wp-data-access-assets-css-wpda_public.css' media='all'/>
        <link rel='stylesheet' id='hello-elementor-css' href='./mdtCivilianSelected/css/hello-elementor-style.min.css' media='all'/>
        <link rel='stylesheet' id='hello-elementor-theme-style-css' href='./mdtCivilianSelected/css/hello-elementor-theme.min.css' media='all'/>
        <link rel='stylesheet' id='elementor-frontend-css' href='./mdtCivilianSelected/css/elementor-assets-css-frontend.min.css' media='all'/>
        <link rel='stylesheet' id='elementor-post-9-css' href='./mdtCivilianSelected/css/elementor-css-post-9.css' media='all'/>
        <link rel='stylesheet' id='elementor-icons-ekiticons-css' href='./mdtCivilianSelected/css/elementskit-lite-modules-elementskit-icon-pack-assets-css-ekiticons.css' media='all'/>
        <link rel='stylesheet' id='elementskit-parallax-style-css' href='./mdtCivilianSelected/css/elementskit-modules-parallax-assets-css-style.css' media='all'/>
        <link rel='stylesheet' id='tablepress-default-css' href='./mdtCivilianSelected/css/tablepress-css-build-default.css' media='all'/>
        <link rel='stylesheet' id='swiper-css' href='./mdtCivilianSelected/css/elementor-assets-lib-swiper-v8-css-swiper.min.css' media='all'/>
        <link rel='stylesheet' id='elementor-pro-css' href='./mdtCivilianSelected/css/elementor-pro-assets-css-frontend.min.css' media='all'/>
        <link rel='stylesheet' id='elementor-global-css' href='./mdtCivilianSelected/css/elementor-css-global.css' media='all'/>
        <link rel='stylesheet' id='elementor-post-13542-css' href='./mdtCivilianSelected/css/elementor-css-post-13542.css' media='all'/>
        <link rel='stylesheet' id='ekit-widget-styles-css' href='./mdtCivilianSelected/css/elementskit-lite-widgets-init-assets-css-widget-styles.css' media='all'/>
        <link rel='stylesheet' id='ekit-widget-styles-pro-css' href='./mdtCivilianSelected/css/elementskit-widgets-init-assets-css-widget-styles-pro.css' media='all'/>
        <link rel='stylesheet' id='ekit-responsive-css' href='./mdtCivilianSelected/css/elementskit-lite-widgets-init-assets-css-responsive.css' media='all'/>
        <link rel='stylesheet' id='ekit-particles-css' href='./mdtCivilianSelected/css/elementskit-modules-particles-assets-css-particles.css' media='all'/>
        <link rel='stylesheet' id='google-fonts-1-css' href='https://fonts.googleapis.com/css?family=Albert+Sans%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CDela+Gothic+One%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=swap&#038;ver=6.4.3' media='all'/>
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <script>
            /* <![CDATA[ */
            var rcewpp = {
                "ajax_url": "https://wp.fivesync.co.uk/wp-admin/admin-ajax.php",
                "nonce": "670556a965",
                "home_url": "https://wp.fivesync.co.uk/",
                "settings_icon": 'https://wp.fivesync.co.uk/wp-content/plugins/export-wp-page-to-static-html/admin/mdtCivilianSelected/images/settings.png',
                "settings_hover_icon": 'https://wp.fivesync.co.uk/wp-content/plugins/export-wp-page-to-static-html/admin/mdtCivilianSelected/images/settings_hover.png'
            };
            /* ]]\> */
        </script>
        <script src="./mdtCivilianSelected/js/dist-vendor-wp-polyfill-inert.min.js" id="wp-polyfill-inert-js"></script>
        <script src="./mdtCivilianSelected/js/dist-vendor-regenerator-runtime.min.js" id="regenerator-runtime-js"></script>
        <script src="./mdtCivilianSelected/js/dist-vendor-wp-polyfill.min.js" id="wp-polyfill-js"></script>
        <script src="./mdtCivilianSelected/js/dist-hooks.min.js" id="wp-hooks-js"></script>
        <script src="https://stats.wp.com/w.js?ver=202407" id="woo-tracks-js"></script>
        <script src="./mdtCivilianSelected/js/jquery-jquery.min.js" id="jquery-core-js"></script>
        <script src="./mdtCivilianSelected/js/jquery-jquery-migrate.min.js" id="jquery-migrate-js"></script>
        <script src="./mdtCivilianSelected/js/2ib-underscore.min.js" id="underscore-js"></script>
        <script src="./mdtCivilianSelected/js/frw-backbone.min.js" id="backbone-js"></script>
        <script id="wp-api-request-js-extra">
            var wpApiSettings = {
                "root": "https:\/\/wp.fivesync.co.uk\/wp-json\/",
                "nonce": "8436831375",
                "versionString": "wp\/v2\/"
            };
        </script>
        <script src="./mdtCivilianSelected/js/ikr-api-request.min.js" id="wp-api-request-js"></script>
        <script src="./mdtCivilianSelected/js/m12-wp-api.min.js" id="wp-api-js"></script>
        <script id="wpda_rest_api-js-extra">
            var wpdaApiSettings = {
                "path": "wpda"
            };
        </script>
        <script src="./mdtCivilianSelected/js/wp-data-access-assets-js-wpda_rest_api.js" id="wpda_rest_api-js"></script>
        <script src="./mdtCivilianSelected/js/elementskit-modules-parallax-assets-js-jarallax.js" id="jarallax-js"></script>
        <link rel="https://api.w.org/" href="https://wp.fivesync.co.uk/wp-json/"/>
        <link rel="alternate" type="application/json" href="https://wp.fivesync.co.uk/wp-json/wp/v2/pages/13542"/>
        <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://wp.fivesync.co.uk/xmlrpc.php?rsd"/>
        <meta name="generator" content="WordPress 6.4.3"/>
        <meta name="generator" content="WooCommerce 8.1.1"/>
        <link rel="canonical" href="https://wp.fivesync.co.uk/c-mdt-civilianselected/"/>
        <link rel='shortlink' href='https://wp.fivesync.co.uk/?p=13542'/>
        <link rel="alternate" type="application/json+oembed" href="https://wp.fivesync.co.uk/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwp.fivesync.co.uk%2Fc-mdt-civilianselected%2F"/>
        <link rel="alternate" type="text/xml+oembed" href="https://wp.fivesync.co.uk/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwp.fivesync.co.uk%2Fc-mdt-civilianselected%2F&#038;format=xml"/>
        <noscript>
            <style>
                .woocommerce-product-gallery {
                    opacity: 1 !important;
                }
            </style>
        </noscript>
        <meta name="generator" content="Elementor 3.19.2; features: e_optimized_assets_loading, e_font_icon_svg, additional_custom_breakpoints, block_editor_assets_optimize, e_image_loading_optimization; settings: css_print_method-external, google_font-enabled, font_display-swap">
        <script type="text/javascript">
            var elementskit_module_parallax_url = "https://wp.fivesync.co.uk/wp-content/plugins/elementskit/modules/parallax/"
        </script>
        <meta name="theme-color" content="#EBEBEB">
        <link rel="icon" href="./mdtCivilianSelected/images/Discord-100x100.png" sizes="32x32"/>
        <link rel="icon" href="./mdtCivilianSelected/images/Discord-300x300.png" sizes="192x192"/>
        <link rel="apple-touch-icon" href="./mdtCivilianSelected/images/Discord-300x300.png"/>
        <meta name="msapplication-TileImage" content="https://wp.fivesync.co.uk/wp-content/uploads/2024/02/Discord-300x300.png"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover"/>
    </head>
    <body class="page-template-default page page-id-13542 wp-custom-logo theme-hello-elementor woocommerce-no-js elementor-default elementor-template-canvas elementor-kit-9 elementor-page elementor-page-13542 elementor-page-60">
        <div data-elementor-type="wp-page" data-elementor-id="13542" class="elementor elementor-13542" data-elementor-post-type="page">
            <div class="elementor-element elementor-element-111891f e-flex e-con-boxed e-con e-parent" data-id="111891f" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                <div class="e-con-inner">
                    <div class="elementor-element elementor-element-23d9e75 e-con-full borderd e-flex e-con e-child" data-id="23d9e75" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                        <div class="elementor-element elementor-element-181c80c e-flex e-con-boxed e-con e-child" data-id="181c80c" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                            <div class="e-con-inner">
                                <div class="elementor-element elementor-element-c21ae73 elementor-widget elementor-widget-heading" data-id="c21ae73" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <h2 class="elementor-heading-title elementor-size-default">
                                            Cali-Coast<br>Civilian MDT
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-2d9f9ac e-flex e-con-boxed e-con e-child" data-id="2d9f9ac" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                            <div class="e-con-inner">
                                <div class="elementor-element elementor-element-290ad96 dashboard-hover elementor-widget elementor-widget-button" data-id="290ad96" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="button.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-button-wrapper">
                                            <a class="elementor-button elementor-button-link elementor-size-sm" href="#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3DeyJpZCI6IjE0MzAzIiwidG9nZ2xlIjpmYWxzZX0%3D">
                                                <span class="elementor-button-content-wrapper">
                                                    <span class="elementor-button-icon elementor-align-icon-left">
                                                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-phone-alt" viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="elementor-button-text">Create 911 Call</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-b2ae67a e-flex e-con-boxed e-con e-child" data-id="b2ae67a" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                            <div class="e-con-inner">
                                <div class="elementor-element elementor-element-6acd695 elementor-widget-divider--view-line_text elementor-widget-divider--element-align-center elementor-widget elementor-widget-divider" data-id="6acd695" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="divider.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-divider">
                                            <span class="elementor-divider-separator">
                                                <span class="elementor-divider__text elementor-divider__element">OR				</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-23e2aa7 e-flex e-con-boxed e-con e-child" data-id="23e2aa7" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                            <div class="e-con-inner">
                                <div class="elementor-element elementor-element-4fcf7af dashboard-hover elementor-widget elementor-widget-button" data-id="4fcf7af" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="button.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-button-wrapper">
                                            <a class="elementor-button elementor-button-link elementor-size-sm" href="#">
                                                <span class="elementor-button-content-wrapper">
                                                    <span class="elementor-button-icon elementor-align-icon-left">
                                                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-user-minus" viewbox="0 0 640 512" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M624 208H432c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h192c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm-400 48c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="elementor-button-text">Character Selection</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-9765fa0 e-flex e-con-boxed e-con e-child" data-id="9765fa0" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                            <div class="e-con-inner">
                                <div class="elementor-element elementor-element-a68c931 dashboard-hover elementor-widget elementor-widget-button" data-id="a68c931" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="button.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-button-wrapper">
                                            <a class="elementor-button elementor-button-link elementor-size-sm" href="#">
                                                <span class="elementor-button-content-wrapper">
                                                    <span class="elementor-button-icon elementor-align-icon-left">
                                                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-sign-out-alt" viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="elementor-button-text">Return Home</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-b592888 e-con-full e-flex e-con e-child" data-id="b592888" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                        <div class="elementor-element elementor-element-95958e9 e-flex e-con-boxed e-con e-child" data-id="95958e9" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                            <div class="e-con-inner">
                                <div class="elementor-element elementor-element-41428dc e-con-full e-flex e-con e-child" data-id="41428dc" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                    <div class="elementor-element elementor-element-c0625e2 e-flex e-con-boxed e-con e-child" data-id="c0625e2" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                        <div class="e-con-inner">
                                            <div class="elementor-element elementor-element-0a58271 e-con-full e-flex e-con e-child" data-id="0a58271" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                <div class="elementor-element elementor-element-03a1139 elementor-align-right elementor-mobile-align-center elementor-widget elementor-widget-button" data-id="03a1139" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="button.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-button-wrapper">
                                                            <a class="elementor-button elementor-button-link elementor-size-xs" href="#">
                                                                <span class="elementor-button-content-wrapper">
                                                                    <span class="elementor-button-icon elementor-align-icon-right">
                                                                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-bell" viewbox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64zm215.39-149.71c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71z"></path>
                                                                        </svg>
                                                                    </span>
                                                                    <span class="elementor-button-text">0</span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-c8adb78 elementor-align-right elementor-mobile-align-center elementor-widget elementor-widget-button" data-id="c8adb78" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="button.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-button-wrapper">
                                                            <a class="elementor-button elementor-button-link elementor-size-xs" href="#">
                                                                <span class="elementor-button-content-wrapper">
                                                                    <span class="elementor-button-icon elementor-align-icon-right">
                                                                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-user-circle" viewbox="0 0 496 512" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z"></path>
                                                                        </svg>
                                                                    </span>
                                                                    <span class="elementor-button-text"><?php echo $username; ?></span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-3135d01 e-flex e-con-boxed e-con e-child" data-id="3135d01" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                            <div class="e-con-inner">
                                <div class="elementor-element elementor-element-80fab6e e-flex e-con-boxed e-con e-child" data-id="80fab6e" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                    <div class="e-con-inner">
                                        <div class="elementor-element elementor-element-e23edea e-con-full e-flex e-con e-child" data-id="e23edea" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                        <?php
                                            session_start();

                                            // Check if the selectedChar parameter is present in the URL
                                            if (isset($_GET['selectedChar'])) {
                                                $selectedCharID = $_GET['selectedChar'];

                                                $query = "SELECT * FROM civCharacters WHERE charID = $selectedCharID AND charOwner = $userid";
                                                $result = mysqli_query($conn, $query);

                                                if ($result) {
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $selectCharacterName = $row['charName'];
                                                            $selectCharacterID = $row['charID'];
                                                            $selectCharacterDOB = $row['charDOB'];
                                                            $selectCharacterHairColor = $row['charHairColour'];
                                                            $selectCharacterEyeColor = $row['charEyeColour'];
                                                            $selectCharacterWeight = $row['charWeight'];
                                                            $selectCharacterHeight = $row['charHeight'];
                                                            $selectCharacterAddress = $row['charAddress'];
                                                            $selectCharacterGender = $row['charGender'];
                                                            $selectCharacterRace = $row['charRace'];
                                                            $selectCharacterBuild = $row['charBuild'];
                                                            $selectCharacterOccupation = $row['charOccupation'];
                                                            $selectCharacterSSN = $row['charSSN'];
                                                            $selectCharacterCreated = $row['charCreated'];

                                                            echo '<div class="elementor-element elementor-element-6027a40 e-grid e-con-boxed e-con" data-id="6027a40" data-element_type="container" data-settings="{&quot;grid_columns_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;grid_columns_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_columns_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_rows_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                            <div class="e-con-inner">        
                                                                <div class="elementor-element elementor-element-df46c2b e-flex e-con-boxed e-con" data-id="df46c2b" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                                    <div class="e-con-inner">
                                                                        <div class="elementor-element elementor-element-dc4ce8e e-con-full e-flex e-con" data-id="dc4ce8e" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                                            <div class="elementor-element elementor-element-9f745ef elementor-widget elementor-widget-heading" data-id="9f745ef" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default">Character Details</h2>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-a3e962f e-con-full e-flex e-con" data-id="a3e962f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                                            <div class="elementor-element elementor-element-9d66af4 dashboard-selected elementor-align-justify elementor-widget elementor-widget-button" data-id="9d66af4" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="button.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <div class="elementor-button-wrapper">
                                                                                        <a class="elementor-button elementor-button-link elementor-size-xs" href="#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3DeyJpZCI6IjE0MDE0IiwidG9nZ2xlIjpmYWxzZX0%3D">
                                                                                            <span class="elementor-button-content-wrapper">
                                                                                                <span class="elementor-button-text">Edit</span>
                                                                                            </span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="elementor-element elementor-element-983e66d e-con-full e-flex e-con" data-id="983e66d" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                                    <div class="elementor-element elementor-element-a7bac03 e-con-full e-flex e-con" data-id="a7bac03" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                                        <div class="elementor-element elementor-element-a1f5110 elementor-widget elementor-widget-heading" data-id="a1f5110" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                            <div class="elementor-widget-container">
                                                                                <h2 class="elementor-heading-title elementor-size-default">
                                                                                    Character Name: <p2>'.$selectCharacterName.'</p2>
                                                                                </h2>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-fe7b492 elementor-widget elementor-widget-heading" data-id="fe7b492" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                            <div class="elementor-widget-container">
                                                                                <h2 class="elementor-heading-title elementor-size-default">
                                                                                    Date Of Birth (DOB): <p2>'.$selectCharacterDOB.'</p2>
                                                                                </h2>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-88d7275 elementor-widget elementor-widget-heading" data-id="88d7275" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                            <div class="elementor-widget-container">
                                                                                <h2 class="elementor-heading-title elementor-size-default">
                                                                                    Social Security (SSN): <p2>'.$selectCharacterSSN.'</p2>
                                                                                </h2>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-13f7199 elementor-widget elementor-widget-heading" data-id="13f7199" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                            <div class="elementor-widget-container">
                                                                                <h2 class="elementor-heading-title elementor-size-default">
                                                                                    Hair Colour: <p2>'.$selectCharacterHairColor.'</p2>
                                                                                </h2>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-8e31ea9 elementor-widget elementor-widget-heading" data-id="8e31ea9" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                            <div class="elementor-widget-container">
                                                                                <h2 class="elementor-heading-title elementor-size-default">
                                                                                    Eye Colour: <p2>'.$selectCharacterEyeColor.'</p2>
                                                                                </h2>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-6222b4e elementor-widget elementor-widget-heading" data-id="6222b4e" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                            <div class="elementor-widget-container">
                                                                                <h2 class="elementor-heading-title elementor-size-default">
                                                                                    Race: <p2>'.$selectCharacterRace.'</p2>
                                                                                </h2>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-851f558 elementor-widget elementor-widget-heading" data-id="851f558" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                            <div class="elementor-widget-container">
                                                                                <h2 class="elementor-heading-title elementor-size-default">
                                                                                    Gender: <p2>'.$selectCharacterGender.'</p2>
                                                                                </h2>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-element elementor-element-b378b14 e-con-full e-flex e-con" data-id="b378b14" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                                        <div class="elementor-element elementor-element-c2844a0 elementor-widget elementor-widget-heading" data-id="c2844a0" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                            <div class="elementor-widget-container">
                                                                                <h2 class="elementor-heading-title elementor-size-default">
                                                                                    Build: <p2>'.$selectCharacterBuild.'</p2>
                                                                                </h2>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-6169a4e elementor-widget elementor-widget-heading" data-id="6169a4e" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                            <div class="elementor-widget-container">
                                                                                <h2 class="elementor-heading-title elementor-size-default">
                                                                                    Current Address: <p2>'.$selectCharacterAddress.'</p2>
                                                                                </h2>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-00bbe73 elementor-widget elementor-widget-heading" data-id="00bbe73" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                            <div class="elementor-widget-container">
                                                                                <h2 class="elementor-heading-title elementor-size-default">
                                                                                    Weight: <p2>'.$selectCharacterWeight.' lbs</p2>
                                                                                </h2>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-3326840 elementor-widget elementor-widget-heading" data-id="3326840" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                            <div class="elementor-widget-container">
                                                                                <h2 class="elementor-heading-title elementor-size-default">
                                                                                    Height: <p2>'.$selectCharacterHeight.' ft.</p2>
                                                                                </h2>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-9023796 elementor-widget elementor-widget-heading" data-id="9023796" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                            <div class="elementor-widget-container">
                                                                                <h2 class="elementor-heading-title elementor-size-default">
                                                                                    Phone Number: <p2>None</p2>
                                                                                </h2>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-d93ba45 elementor-widget elementor-widget-heading" data-id="d93ba45" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                            <div class="elementor-widget-container">
                                                                                <h2 class="elementor-heading-title elementor-size-default">
                                                                                    Occupation/Job: <p2>'.$selectCharacterOccupation.'</p2>
                                                                                </h2>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>';

                                                            }
                                                        }
                                                    }
                                                }
                                            ?>

                                            <div class="elementor-element elementor-element-afdbdf4 e-flex e-con-boxed e-con e-child" data-id="afdbdf4" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                <div class="e-con-inner">
                                                <?php
                                                session_start();

                                                // Check if the selectedChar parameter is present in the URL
                                                if (isset($_GET['selectedChar'])) {
                                                    $selectedCharID = $_GET['selectedChar'];

                                                    $query = "SELECT * FROM civCharacters WHERE charID = $selectedCharID AND charOwner = $userid";
                                                    $result = mysqli_query($conn, $query);

                                                    if ($result) {
                                                        if (mysqli_num_rows($result) > 0) {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                $selectCharacterName = $row['charName'];
                                                                $selectCharacterID = $row['charID'];
                                                                $selectCharacterDOB = $row['charDOB'];
                                                                $selectCharacterHairColor = $row['charHairColour'];
                                                                $selectCharacterEyeColor = $row['charEyeColour'];
                                                                $selectCharacterWeight = $row['charWeight'];
                                                                $selectCharacterHeight = $row['charHeight'];
                                                                $selectCharacterAddress = $row['charAddress'];
                                                                $selectCharacterGender = $row['charGender'];
                                                                $selectCharacterRace = $row['charRace'];
                                                                $selectCharacterBuild = $row['charBuild'];
                                                                $selectCharacterOccupation = $row['charOccupation'];
                                                                $selectCharacterSSN = $row['charSSN'];
                                                                $selectCharacterCreated = $row['charCreated'];

                                                                $selectCharacterBloodType = $row['bloodtype'];
                                                                $selectCharacterAllergies = $row['allergies'];
                                                                $selectCharacterEmergencyContact = $row['emergcontact'];
                                                                $selectCharacterMedication = $row['medication'];

                                                                $selectCharacterDrivers = $row['driversLicense'];
                                                                $selectCharacterWeapons = $row['weaponsLicense'];
                                                                $selectCharacterHunting = $row['huntingLicense'];
                                                                $selectCharacterCommercial = $row['commercialLicense'];
                                                                $selectCharacterFishing = $row['fishingLicense'];
                                                                $selectCharacterAviation = $row['aviationLicense'];
                                                                $selectCharacterBoating = $row['boatingLicense'];

                                                                echo '<div class="elementor-element elementor-element-8873c9d e-con-full e-flex e-con" data-id="8873c9d" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                                <div class="elementor-element elementor-element-d7c2670 e-grid e-con-full e-con" data-id="d7c2670" data-element_type="container" data-settings="{&quot;grid_columns_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;full&quot;,&quot;grid_columns_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_columns_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_rows_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                                    <div class="elementor-element elementor-element-29da764 e-flex e-con-boxed e-con" data-id="29da764" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                                        <div class="e-con-inner">
                                                                            <div class="elementor-element elementor-element-3e7d618 e-con-full e-flex e-con" data-id="3e7d618" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                                                <div class="elementor-element elementor-element-4c3fa0b elementor-widget elementor-widget-heading" data-id="4c3fa0b" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                                    <div class="elementor-widget-container">
                                                                                        <h2 class="elementor-heading-title elementor-size-default">Licensing Details</h2>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-790d3e1 e-con-full e-flex e-con" data-id="790d3e1" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                                                <div class="elementor-element elementor-element-4a7750f dashboard-selected elementor-align-justify elementor-widget elementor-widget-button" data-id="4a7750f" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="button.default">
                                                                                    <div class="elementor-widget-container">
                                                                                        <div class="elementor-button-wrapper">
                                                                                            <a class="elementor-button elementor-button-link elementor-size-xs" href="#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3DeyJpZCI6IjE0MDUyIiwidG9nZ2xlIjpmYWxzZX0%3D">
                                                                                                <span class="elementor-button-content-wrapper">
                                                                                                    <span class="elementor-button-text">Edit</span>
                                                                                                </span>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-element elementor-element-0c981e7 e-flex e-con-boxed e-con" data-id="0c981e7" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                                        <div class="e-con-inner">
                                                                            <div class="elementor-element elementor-element-10256ea elementor-widget elementor-widget-heading" data-id="10256ea" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default">
                                                                                        Driving License: <p2>'.$selectCharacterDrivers.'</p2>
                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-9ed09b0 elementor-widget elementor-widget-heading" data-id="9ed09b0" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default">
                                                                                        Weapons License: <p2>'.$selectCharacterWeapons.'</p2>
                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-aac03a4 elementor-widget elementor-widget-heading" data-id="aac03a4" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default">
                                                                                        Commercial License: <p2>'.$selectCharacterCommercial.'</p2>
                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-742e8a8 elementor-widget elementor-widget-heading" data-id="742e8a8" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default">
                                                                                        Hunting License: <p2>'.$selectCharacterHunting.'</p2>
                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-4084df3 elementor-widget elementor-widget-heading" data-id="4084df3" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default">
                                                                                        Fishing License: <p2>'.$selectCharacterFishing.'</p2>
                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-b6265b0 elementor-widget elementor-widget-heading" data-id="b6265b0" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default">
                                                                                        Aviation License: <p2>'.$selectCharacterAviation.'</p2>
                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-7225310 elementor-widget elementor-widget-heading" data-id="7225310" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default">
                                                                                        Boating License: <p2>'.$selectCharacterBoating.'</p2>
                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>';

                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                    <?php
                                                session_start();

                                                // Check if the selectedChar parameter is present in the URL
                                                if (isset($_GET['selectedChar'])) {
                                                    $selectedCharID = $_GET['selectedChar'];

                                                    $query = "SELECT * FROM civCharacters WHERE charID = $selectedCharID AND charOwner = $userid";
                                                    $result = mysqli_query($conn, $query);

                                                    if ($result) {
                                                        if (mysqli_num_rows($result) > 0) {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                $selectCharacterName = $row['charName'];
                                                                $selectCharacterID = $row['charID'];
                                                                $selectCharacterDOB = $row['charDOB'];
                                                                $selectCharacterHairColor = $row['charHairColour'];
                                                                $selectCharacterEyeColor = $row['charEyeColour'];
                                                                $selectCharacterWeight = $row['charWeight'];
                                                                $selectCharacterHeight = $row['charHeight'];
                                                                $selectCharacterAddress = $row['charAddress'];
                                                                $selectCharacterGender = $row['charGender'];
                                                                $selectCharacterRace = $row['charRace'];
                                                                $selectCharacterBuild = $row['charBuild'];
                                                                $selectCharacterOccupation = $row['charOccupation'];
                                                                $selectCharacterSSN = $row['charSSN'];
                                                                $selectCharacterCreated = $row['charCreated'];

                                                                $selectCharacterBloodType = $row['bloodType'];
                                                                $selectCharacterAllergies = $row['allergies'];
                                                                $selectCharacterEmergencyContact = $row['emergencyContact'];
                                                                $selectCharacterMedication = $row['medication'];
                                                                $selectCharacterOrganDonor = $row['organDonor'];

                                                                $selectCharacterDrivers = $row['driversLicense'];
                                                                $selectCharacterWeapons = $row['weaponsLicense'];
                                                                $selectCharacterHunting = $row['huntingLicense'];
                                                                $selectCharacterCommercial = $row['commercialLicense'];
                                                                $selectCharacterFishing = $row['fishingLicense'];
                                                                $selectCharacterAviation = $row['aviationLicense'];
                                                                $selectCharacterBoating = $row['boatingLicense'];

                                                                echo '<div class="elementor-element elementor-element-a70130c e-con-full e-flex e-con" data-id="a70130c" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                                <div class="elementor-element elementor-element-d15e518 e-grid e-con-full e-con" data-id="d15e518" data-element_type="container" data-settings="{&quot;grid_columns_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;full&quot;,&quot;grid_columns_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_columns_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_rows_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                                    <div class="elementor-element elementor-element-3275d6a e-flex e-con-boxed e-con" data-id="3275d6a" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                                        <div class="e-con-inner">
                                                                            <div class="elementor-element elementor-element-0bc2bdd e-con-full e-flex e-con" data-id="0bc2bdd" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                                                <div class="elementor-element elementor-element-e6d091b elementor-widget elementor-widget-heading" data-id="e6d091b" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                                    <div class="elementor-widget-container">
                                                                                        <h2 class="elementor-heading-title elementor-size-default">Medical Information</h2>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-d1fd527 e-con-full e-flex e-con" data-id="d1fd527" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                                                <div class="elementor-element elementor-element-c86645f dashboard-selected elementor-align-justify elementor-widget elementor-widget-button" data-id="c86645f" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="button.default">
                                                                                    <div class="elementor-widget-container">
                                                                                        <div class="elementor-button-wrapper">
                                                                                            <a class="elementor-button elementor-button-link elementor-size-xs" href="#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3DeyJpZCI6IjE0MDYzIiwidG9nZ2xlIjpmYWxzZX0%3D">
                                                                                                <span class="elementor-button-content-wrapper">
                                                                                                    <span class="elementor-button-text">Edit</span>
                                                                                                </span>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-element elementor-element-7f1bd8c e-flex e-con-boxed e-con" data-id="7f1bd8c" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                                        <div class="e-con-inner">
                                                                            <div class="elementor-element elementor-element-33f0870 elementor-widget elementor-widget-heading" data-id="33f0870" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default">
                                                                                        Blood Type: <p2>'.$selectCharacterBloodType.'</p2>
                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-5e92c42 elementor-widget elementor-widget-heading" data-id="5e92c42" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default">
                                                                                        Allergies: <p2>'.$selectCharacterAllergies.'</p2>
                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-8567b3d elementor-widget elementor-widget-heading" data-id="8567b3d" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default">
                                                                                        Emergency Contact: <p2>'.$selectCharacterEmergencyContact.'</p2>
                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-f5885c5 elementor-widget elementor-widget-heading" data-id="f5885c5" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default">
                                                                                        Medication(s): <p2>'.$selectCharacterMedication.'</p2>
                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-8d57edf elementor-widget elementor-widget-heading" data-id="8d57edf" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default">
                                                                                        Organ Donor?: <p2>'.$selectCharacterOrganDonor.'</p2>
                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>';
                                                                
                                                                }
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-d18492a e-flex e-con-boxed e-con e-child" data-id="d18492a" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                            <div class="e-con-inner">
                                                
                                            <?php
                                            session_start();

                                            // Check if the selectedChar parameter is present in the URL
                                            if (isset($_GET['selectedChar'])) {
                                                $selectedCharID = $_GET['selectedChar'];

                                                $query = "SELECT * FROM civCharacters WHERE charID = $selectedCharID AND charOwner = $userid";
                                                $result = mysqli_query($conn, $query);

                                                if ($result) {
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            

                                                            echo '<div class="elementor-element elementor-element-4143c8c e-flex e-con-boxed e-con e-child" data-id="4143c8c" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                            <div class="e-con-inner">
                                                                <div class="elementor-element elementor-element-63e7cd1 e-con-full e-flex e-con e-child" data-id="63e7cd1" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                                    <div class="elementor-element elementor-element-3af9363 elementor-widget elementor-widget-heading" data-id="3af9363" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                        <div class="elementor-widget-container">
                                                                            <h2 class="elementor-heading-title elementor-size-default">Registered Vehicles</h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="elementor-element elementor-element-ee68d61 e-con-full e-flex e-con e-child" data-id="ee68d61" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                                    <div class="elementor-element elementor-element-4af468f dashboard-selected elementor-align-justify elementor-widget elementor-widget-button" data-id="4af468f" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="button.default">
                                                                        <div class="elementor-widget-container">
                                                                            <div class="elementor-button-wrapper">
                                                                                <a class="elementor-button elementor-button-link elementor-size-xs" href="#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3DeyJpZCI6IjE0MDY5IiwidG9nZ2xlIjpmYWxzZX0%3D">
                                                                                    <span class="elementor-button-content-wrapper">
                                                                                        <span class="elementor-button-text">Register Vehicle</span>
                                                                                    </span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>';
                                                            
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>

                                                <?php
                                                session_start();

                                                // Check if the selectedChar parameter is present in the URL
                                                if (isset($_GET['selectedChar'])) {
                                                    $selectedCharID = $_GET['selectedChar'];

                                                    $query = "SELECT * FROM civCharacters WHERE charID = $selectedCharID AND charOwner = $userid";
                                                    $result = mysqli_query($conn, $query);

                                                    if ($result) {

                                                        if (mysqli_num_rows($result) > 0) {
                                                            echo '<div class="elementor-element elementor-element-6379c06 selector e-flex e-con-boxed e-con e-child" data-id="6379c06" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                            <div class="e-con-inner">
                                                                <div class="elementor-element elementor-element-425a852 elementor-widget elementor-widget-elementskit-table" data-id="425a852" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="elementskit-table.default">
                                                                    <div class="elementor-widget-container">
                                                                        <div class="ekit-wid-con">
                                                                            <div class="ekit_table display  ekit_table_data_type-custom" data-settings="{&quot;fixedHeader&quot;:false,&quot;search&quot;:false,&quot;responsive&quot;:false,&quot;pagination&quot;:false,&quot;button&quot;:false,&quot;entries&quot;:false,&quot;info&quot;:false,&quot;ordering&quot;:false,&quot;item_per_page&quot;:10,&quot;nav_style&quot;:&quot;&quot;,&quot;prev_text&quot;:&quot;&quot;,&quot;next_text&quot;:&quot;&quot;,&quot;prev_arrow&quot;:&quot;&quot;,&quot;next_arrow&quot;:&quot;&quot;}">
                                                                                <table id="ekit-table-container-425a852" class="display dataTable" style="width:100%">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th style="border-top-left-radius: 5px;" class="elementor-repeater-item-f691a13">
                                                                                                <div class="ekit_table_item_container  ekit-table-container-">ID</div>
                                                                                            </th>
                                                                                            <th class="elementor-repeater-item-5fdf219">
                                                                                                <div class="ekit_table_item_container  ekit-table-container-">Plate</div>
                                                                                            </th>
                                                                                            <th class="elementor-repeater-item-6b0a5f8">
                                                                                                <div class="ekit_table_item_container  ekit-table-container-">Model</div>
                                                                                            </th>
                                                                                            <th class="elementor-repeater-item-6b0a5f8">
                                                                                                <div class="ekit_table_item_container  ekit-table-container-">Colour</div>
                                                                                            </th>
                                                                                            <th class="elementor-repeater-item-6b0a5f8">
                                                                                                <div class="ekit_table_item_container  ekit-table-container-">Insurance</div>
                                                                                            </th>
                                                                                            <th class="elementor-repeater-item-6b0a5f8">
                                                                                                <div class="ekit_table_item_container  ekit-table-container-">Vin #</div>
                                                                                            </th>
                                                                                            <th style="border-top-right-radius: 5px;" class="elementor-repeater-item-6b0a5f8">
                                                                                                <div class="ekit_table_item_container  ekit-table-container-">Action</div>
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>';
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                $selectCharacterName = $row['charname'];
                                                                $selectCharacterID = $row['charid'];

                                                                $query2 = "SELECT * FROM civVehicles WHERE charID = $selectedCharID ORDER BY dateRegistered DESC";
                                                                $result2 = mysqli_query($conn, $query2);

                                                                if ($result2) {
                                                                    if (mysqli_num_rows($result2) > 0) {
                                                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                                                            $vehicleName = $row2['vehicleMakeModel'];
                                                                            $vehiclePlate = $row2['vehiclePlate'];
                                                                            $vehicleColour = $row2['vehicleColour'];
                                                                            $vehicleID = $row2['vehicleID'];
                                                                            $vehicleInsurance = $row2['vehicleInsurance'];
                                                                            $vehicleFlags = $row2['vehicleFlags'];
                                                                            $vehicleVin = $row2['vehicleVin'];
                                                                            $vehicleRegistered = $row2['dateRegistered'];

                                                                            echo '<tbody>
                                                                            <tr>
                                                                                <td data-order="Column 1" class="elementor-repeater-item-092e007 ekit_table_data_">
                                                                                    <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left">#'.$vehicleID.'                                   </div>
                                                                                </td>
                                                                                <td data-order="Column 2" class="elementor-repeater-item-32987aa ekit_table_data_">
                                                                                    <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left">'.$vehiclePlate.'                                    </div>
                                                                                </td>
                                                                                <td data-order="Column 3" class="elementor-repeater-item-9baadb4 ekit_table_data_">
                                                                                    <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left">'.$vehicleName.'                                    </div>
                                                                                </td>
                                                                                <td data-order="Column 4" class="elementor-repeater-item-9baadb4 ekit_table_data_">
                                                                                    <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left">'.$vehicleColour.'                                    </div>
                                                                                </td>
                                                                                <td data-order="Column 5" class="elementor-repeater-item-9baadb4 ekit_table_data_">
                                                                                    <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left">'.$vehicleInsurance.'                                    </div>
                                                                                </td>
                                                                                <td data-order="Column 6" class="elementor-repeater-item-9baadb4 ekit_table_data_">
                                                                                    <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left">'.$vehicleVin.'                                    </div>
                                                                                </td>
                                                                                <td data-order="Column 7" class="elementor-repeater-item-9baadb4 ekit_table_data_">
                                                                                    <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left"><a href="#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3DeyJpZCI6IjE0MDc4IiwidG9nZ2xlIjpmYWxzZX0%3D"><btn>Edit</btn></a>, Delete                                    </div>
                                                                                </td>
                                                                        </tbody>';

                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                    echo '</table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                                        }
                                        ?>
                                                
                                                
                                                                            
                                                                        
                                        <div class="elementor-element elementor-element-d0cbdf4 e-flex e-con-boxed e-con e-child" data-id="d0cbdf4" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                            <div class="e-con-inner">
                                                <div class="elementor-element elementor-element-2e44bb4 selector e-flex e-con-boxed e-con e-child" data-id="2e44bb4" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                    <div class="e-con-inner">

                                                <?php
                                                session_start();

                                                // Check if the selectedChar parameter is present in the URL
                                                if (isset($_GET['selectedChar'])) {
                                                    $selectedCharID = $_GET['selectedChar'];

                                                    $query = "SELECT * FROM civCharacters WHERE charID = $selectedCharID AND charOwner = $userid";
                                                    $result = mysqli_query($conn, $query);

                                                    if ($result) {

                                                        if (mysqli_num_rows($result) > 0) {
                                                            echo '<div class="elementor-element elementor-element-6379c06 selector e-flex e-con-boxed e-con e-child" data-id="6379c06" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                            <div class="e-con-inner">
                                                                <div class="elementor-element elementor-element-425a852 elementor-widget elementor-widget-elementskit-table" data-id="425a852" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="elementskit-table.default">
                                                                    <div class="elementor-widget-container">
                                                                        <div class="ekit-wid-con">
                                                                            <div class="ekit_table display  ekit_table_data_type-custom" data-settings="{&quot;fixedHeader&quot;:false,&quot;search&quot;:false,&quot;responsive&quot;:false,&quot;pagination&quot;:false,&quot;button&quot;:false,&quot;entries&quot;:false,&quot;info&quot;:false,&quot;ordering&quot;:false,&quot;item_per_page&quot;:10,&quot;nav_style&quot;:&quot;&quot;,&quot;prev_text&quot;:&quot;&quot;,&quot;next_text&quot;:&quot;&quot;,&quot;prev_arrow&quot;:&quot;&quot;,&quot;next_arrow&quot;:&quot;&quot;}">
                                                                                <table id="ekit-table-container-425a852" class="display dataTable" style="width:100%">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th style="border-top-left-radius: 5px;" class="elementor-repeater-item-f691a13">
                                                                                                <div class="ekit_table_item_container  ekit-table-container-">ID</div>
                                                                                            </th>
                                                                                            <th class="elementor-repeater-item-5fdf219">
                                                                                                <div class="ekit_table_item_container  ekit-table-container-">S/N</div>
                                                                                            </th>
                                                                                            <th class="elementor-repeater-item-6b0a5f8">
                                                                                                <div class="ekit_table_item_container  ekit-table-container-">Model</div>
                                                                                            </th>
                                                                                            <th class="elementor-repeater-item-6b0a5f8">
                                                                                                <div class="ekit_table_item_container  ekit-table-container-">Type</div>
                                                                                            </th>
                                                                                            <th class="elementor-repeater-item-6b0a5f8">
                                                                                                <div class="ekit_table_item_container  ekit-table-container-">Colour</div>
                                                                                            </th>
                                                                                            <th class="elementor-repeater-item-6b0a5f8">
                                                                                                <div class="ekit_table_item_container  ekit-table-container-">Flags</div>
                                                                                            </th>
                                                                                            <th style="border-top-right-radius: 5px;" class="elementor-repeater-item-6b0a5f8">
                                                                                                <div class="ekit_table_item_container  ekit-table-container-">Action</div>
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>';
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                $selectCharacterName = $row['charName'];
                                                                $selectCharacterID = $row['charID'];

                                                                $query2 = "SELECT * FROM civWeapons WHERE charID = $selectedCharID ORDER BY dateRegistered DESC";
                                                                $result2 = mysqli_query($conn, $query2);

                                                                if ($result2) {
                                                                    if (mysqli_num_rows($result2) > 0) {
                                                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                                                            $weaponType = $row2['weaponType'];
                                                                                    $weaponModel = $row2['weaponModel'];
                                                                                    $weaponFlags = $row2['weaponFlags'];
                                                                                    $weaponSerialNumber = $row2['weaponSerialNumber'];
                                                                                    $weaponColour = $row2['weaponColour'];
                                                                                    $dateRegistered = $row2['dateRegistered'];
                                                                                    $weaponID = $row2['weaponID'];
                                                                                    $weaponAttachments = $row2['weaponAttachments'];
                                                                                    $weaponRegStatus = $row2['weaponRegStatus'];

                                                                            echo '<tbody>
                                                                            <tr>
                                                                                <td data-order="Column 1" class="elementor-repeater-item-092e007 ekit_table_data_">
                                                                                    <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left">#'.$weaponID.'                                   </div>
                                                                                </td>
                                                                                <td data-order="Column 2" class="elementor-repeater-item-32987aa ekit_table_data_">
                                                                                    <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left">'.$weaponSerialNumber.'                                    </div>
                                                                                </td>
                                                                                <td data-order="Column 3" class="elementor-repeater-item-9baadb4 ekit_table_data_">
                                                                                    <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left">'.$weaponModel.'                                    </div>
                                                                                </td>
                                                                                <td data-order="Column 4" class="elementor-repeater-item-9baadb4 ekit_table_data_">
                                                                                    <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left">'.$weaponType.'                                    </div>
                                                                                </td>
                                                                                <td data-order="Column 5" class="elementor-repeater-item-9baadb4 ekit_table_data_">
                                                                                    <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left">'.$weaponColour.'                                    </div>
                                                                                </td>
                                                                                <td data-order="Column 6" class="elementor-repeater-item-9baadb4 ekit_table_data_">
                                                                                    <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left">'.$weaponFlags.'                                    </div>
                                                                                </td>
                                                                                <td data-order="Column 7" class="elementor-repeater-item-9baadb4 ekit_table_data_">
                                                                                    <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left"><a href="#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3DeyJpZCI6IjE0MDkxIiwidG9nZ2xlIjpmYWxzZX0%3D"><btn>Edit</btn></a>, Delete                                    </div>
                                                                                </td>
                                                                        </tbody>';

                                                                        }
                                                                    }
                                                                } else {
                                                                    //
                                                                }
                                                            }
                                                        }
                                                    }
                                                    echo '</table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ';
                                        }
                                        ?>
                                                    </div>
                                                </div>
                                                <?php
                                            session_start();

                                            // Check if the selectedChar parameter is present in the URL
                                            if (isset($_GET['selectedChar'])) {
                                                $selectedCharID = $_GET['selectedChar'];

                                                $query = "SELECT * FROM civCharacters WHERE charID = $selectedCharID AND charOwner = $userid";
                                                $result = mysqli_query($conn, $query);

                                                if ($result) {
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            

                                                            echo '<div class="elementor-element elementor-element-e0efec7 e-flex e-con-boxed e-con e-child" data-id="e0efec7" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                            <div class="e-con-inner">
                                                                <div class="elementor-element elementor-element-30963f8 e-con-full e-flex e-con e-child" data-id="30963f8" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                                    <div class="elementor-element elementor-element-3a3061d elementor-widget elementor-widget-heading" data-id="3a3061d" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                        <div class="elementor-widget-container">
                                                                            <h2 class="elementor-heading-title elementor-size-default">Registered Weapons</h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="elementor-element elementor-element-c6185b8 e-con-full e-flex e-con e-child" data-id="c6185b8" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                                    <div class="elementor-element elementor-element-c3540a7 dashboard-selected elementor-align-justify elementor-widget elementor-widget-button" data-id="c3540a7" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="button.default">
                                                                        <div class="elementor-widget-container">
                                                                            <div class="elementor-button-wrapper">
                                                                                <a class="elementor-button elementor-button-link elementor-size-xs" href="#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3DeyJpZCI6IjE0MDg0IiwidG9nZ2xlIjpmYWxzZX0%3D">
                                                                                    <span class="elementor-button-content-wrapper">
                                                                                        <span class="elementor-button-text">Register Weapon</span>
                                                                                    </span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>';
                                                            
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-6adac14 e-flex e-con-boxed e-con e-child" data-id="6adac14" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                            <div class="e-con-inner">
                                                <div class="elementor-element elementor-element-0b099d6 selector e-flex e-con-boxed e-con e-child" data-id="0b099d6" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                    <div class="e-con-inner">
                                                    <?php
                                                session_start();

                                                // Check if the selectedChar parameter is present in the URL
                                                if (isset($_GET['selectedChar'])) {
                                                    $selectedCharID = $_GET['selectedChar'];

                                                    $query = "SELECT * FROM civCharacters WHERE charID = $selectedCharID AND charOwner = $userid";
                                                    $result = mysqli_query($conn, $query);

                                                    if ($result) {

                                                        if (mysqli_num_rows($result) > 0) {
                                                            echo '<div class="elementor-element elementor-element-6379c06 selector e-flex e-con-boxed e-con e-child" data-id="6379c06" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                            <div class="e-con-inner">
                                                                <div class="elementor-element elementor-element-425a852 elementor-widget elementor-widget-elementskit-table" data-id="425a852" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="elementskit-table.default">
                                                                    <div class="elementor-widget-container">
                                                                        <div class="ekit-wid-con">
                                                                            <div class="ekit_table display  ekit_table_data_type-custom" data-settings="{&quot;fixedHeader&quot;:false,&quot;search&quot;:false,&quot;responsive&quot;:false,&quot;pagination&quot;:false,&quot;button&quot;:false,&quot;entries&quot;:false,&quot;info&quot;:false,&quot;ordering&quot;:false,&quot;item_per_page&quot;:10,&quot;nav_style&quot;:&quot;&quot;,&quot;prev_text&quot;:&quot;&quot;,&quot;next_text&quot;:&quot;&quot;,&quot;prev_arrow&quot;:&quot;&quot;,&quot;next_arrow&quot;:&quot;&quot;}">
                                                                                <table id="ekit-table-container-425a852" class="display dataTable" style="width:100%">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th style="border-top-left-radius: 5px;" class="elementor-repeater-item-f691a13">
                                                                                                <div class="ekit_table_item_container  ekit-table-container-">ID</div>
                                                                                            </th>
                                                                                            <th class="elementor-repeater-item-5fdf219">
                                                                                                <div class="ekit_table_item_container  ekit-table-container-">Type</div>
                                                                                            </th>
                                                                                            <th class="elementor-repeater-item-6b0a5f8">
                                                                                                <div class="ekit_table_item_container  ekit-table-container-">Submitter</div>
                                                                                            </th>
                                                                                            <th class="elementor-repeater-item-6b0a5f8">
                                                                                                <div class="ekit_table_item_container  ekit-table-container-">Date</div>
                                                                                            </th>
                                                                                            <th class="elementor-repeater-item-6b0a5f8">
                                                                                                <div class="ekit_table_item_container  ekit-table-container-">Last Updated</div>
                                                                                            </th>
                                                                                            <th class="elementor-repeater-item-6b0a5f8">
                                                                                                <div class="ekit_table_item_container  ekit-table-container-">Flags</div>
                                                                                            </th>
                                                                                            <th style="border-top-right-radius: 5px;" class="elementor-repeater-item-6b0a5f8">
                                                                                                <div class="ekit_table_item_container  ekit-table-container-">Action</div>
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>';
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                $selectCharacterName = $row['charName'];
                                                                $selectCharacterID = $row['charID'];

                                                                $query2 = "SELECT * FROM leoReports WHERE charID = $selectedCharID ORDER BY reportTimeDate DESC";
                                                                $result2 = mysqli_query($conn, $query2);

                                                                if ($result2) {
                                                                    if (mysqli_num_rows($result2) > 0) {
                                                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                                                            $reportID = $row2['reportID'];
                                                                            $reportType = $row2['reportType'];
                                                                            $reportSubmitter = $row2['reportSigningUnit'];
                                                                            $reportDate = $row2['reportTimeDate'];
                                                                            $reportLastUpdated = $row2['lastUpdated'];
                                                                            if(!$reportLastUpdated) {
                                                                                $reportLastUpdated = "Never updated.";
                                                                            }
                                                                            $reportFlags = $row2['needsApproval'];
                                                                            if($reportFlags === "Yes") {
                                                                                $reportFlags = "Awaiting Approval";
                                                                            } else if($reportFlags === "No") {
                                                                                $reportFlags = "Approved";
                                                                            }
                                                                            
                                                                            echo '<tbody>
                                                                            <tr>
                                                                                <td data-order="Column 1" class="elementor-repeater-item-092e007 ekit_table_data_">
                                                                                    <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left">#'.$reportID.'                                   </div>
                                                                                </td>
                                                                                <td data-order="Column 2" class="elementor-repeater-item-32987aa ekit_table_data_">
                                                                                    <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left">'.$reportType.'                                    </div>
                                                                                </td>
                                                                                <td data-order="Column 3" class="elementor-repeater-item-9baadb4 ekit_table_data_">
                                                                                    <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left">'.$reportSubmitter.'                                    </div>
                                                                                </td>
                                                                                <td data-order="Column 4" class="elementor-repeater-item-9baadb4 ekit_table_data_">
                                                                                    <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left">'.$reportDate.'                                    </div>
                                                                                </td>
                                                                                <td data-order="Column 5" class="elementor-repeater-item-9baadb4 ekit_table_data_">
                                                                                    <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left">'.$reportLastUpdated.'                                    </div>
                                                                                </td>
                                                                                <td data-order="Column 6" class="elementor-repeater-item-9baadb4 ekit_table_data_">
                                                                                    <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left">'.$reportFlags.'                                    </div>
                                                                                </td>
                                                                                <td data-order="Column 7" class="elementor-repeater-item-9baadb4 ekit_table_data_">
                                                                                    <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left">Edit, Delete                                    </div>
                                                                                </td>
                                                                        </tbody>';

                                                                        }
                                                                    }
                                                                } else {
                                                                    echo 't';
                                                                }
                                                            }
                                                        }
                                                    }
                                                    echo '</table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ';
                                        }
                                        ?>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-1ee289e e-flex e-con-boxed e-con e-child" data-id="1ee289e" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                    <div class="e-con-inner">
                                                        <div class="elementor-element elementor-element-71a97f4 e-con-full e-flex e-con e-child" data-id="71a97f4" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                            <div class="elementor-element elementor-element-2ffa008 elementor-widget elementor-widget-heading" data-id="2ffa008" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                <div class="elementor-widget-container">
                                                                    <h2 class="elementor-heading-title elementor-size-default">Crime History</h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-23c3f6f e-con-full e-flex e-con e-child" data-id="23c3f6f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                            <div class="elementor-element elementor-element-4508c42 elementor-search-form--skin-minimal elementor-widget elementor-widget-search-form" data-id="4508c42" data-element_type="widget" data-settings="{&quot;skin&quot;:&quot;minimal&quot;,&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="search-form.default">
                                                                <div class="elementor-widget-container">
                                                                    <form class="elementor-search-form" action="https://wp.fivesync.co.uk" method="get" role="search">
                                                                        <div class="elementor-search-form__container">
                                                                            <label class="elementor-screen-only" for="elementor-search-form-4508c42">Search</label>
                                                                            <div class="elementor-search-form__icon">
                                                                                <div class="e-font-icon-svg-container">
                                                                                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-search" viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                                                                        <path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                                                                                    </svg>
                                                                                </div>
                                                                                <span class="elementor-screen-only">Search</span>
                                                                            </div>
                                                                            <input id="elementor-search-form-4508c42" placeholder="Search reports..." class="elementor-search-form__input" type="search" name="s" value="">
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="elementor-element elementor-element-1ffb99f e-flex e-con-boxed e-con e-child" data-id="1ffb99f" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                            <div class="e-con-inner">
                                                <div class="elementor-element elementor-element-1bc78bb e-flex e-con-boxed e-con e-child" data-id="1bc78bb" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                    <div class="e-con-inner">
                                                        <div class="elementor-element elementor-element-52cec1f e-con-full e-flex e-con e-child" data-id="52cec1f" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                            <div class="elementor-element elementor-element-7ded2e6 elementor-widget elementor-widget-heading" data-id="7ded2e6" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                                <div class="elementor-widget-container">
                                                                    <h2 class="elementor-heading-title elementor-size-default">Medical History</h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-424446d e-con-full e-flex e-con e-child" data-id="424446d" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                            <div class="elementor-element elementor-element-32e09c1 elementor-search-form--skin-minimal elementor-widget elementor-widget-search-form" data-id="32e09c1" data-element_type="widget" data-settings="{&quot;skin&quot;:&quot;minimal&quot;,&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="search-form.default">
                                                                <div class="elementor-widget-container">
                                                                    <form class="elementor-search-form" action="https://wp.fivesync.co.uk" method="get" role="search">
                                                                        <div class="elementor-search-form__container">
                                                                            <label class="elementor-screen-only" for="elementor-search-form-32e09c1">Search</label>
                                                                            <div class="elementor-search-form__icon">
                                                                                <div class="e-font-icon-svg-container">
                                                                                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-search" viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                                                                        <path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                                                                                    </svg>
                                                                                </div>
                                                                                <span class="elementor-screen-only">Search</span>
                                                                            </div>
                                                                            <input id="elementor-search-form-32e09c1" placeholder="Search reports..." class="elementor-search-form__input" type="search" name="s" value="">
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-0de6f69 selector e-flex e-con-boxed e-con e-child" data-id="0de6f69" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                                    <div class="e-con-inner">
                                                        <div class="elementor-element elementor-element-661d763 elementor-widget elementor-widget-elementskit-table" data-id="661d763" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="elementskit-table.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="ekit-wid-con">
                                                                    <div class="ekit_table display  ekit_table_data_type-custom" data-settings="{&quot;fixedHeader&quot;:false,&quot;search&quot;:false,&quot;responsive&quot;:false,&quot;pagination&quot;:false,&quot;button&quot;:false,&quot;entries&quot;:false,&quot;info&quot;:false,&quot;ordering&quot;:false,&quot;item_per_page&quot;:10,&quot;nav_style&quot;:&quot;&quot;,&quot;prev_text&quot;:&quot;&quot;,&quot;next_text&quot;:&quot;&quot;,&quot;prev_arrow&quot;:&quot;&quot;,&quot;next_arrow&quot;:&quot;&quot;}">
                                                                        <table id="ekit-table-container-661d763" class="display dataTable" style="width:100%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="elementor-repeater-item-f691a13">
                                                                                        <div class="ekit_table_item_container  ekit-table-container-">Header Col 1                             </div>
                                                                                    </th>
                                                                                    <th class="elementor-repeater-item-5fdf219">
                                                                                        <div class="ekit_table_item_container  ekit-table-container-">Header Col 2                            </div>
                                                                                    </th>
                                                                                    <th class="elementor-repeater-item-6b0a5f8">
                                                                                        <div class="ekit_table_item_container  ekit-table-container-">Header Col 3                            </div>
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td data-order="Column 1" class="elementor-repeater-item-092e007 ekit_table_data_">
                                                                                        <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left">Column 1                                    </div>
                                                                                    </td>
                                                                                    <td data-order="Column 2" class="elementor-repeater-item-32987aa ekit_table_data_">
                                                                                        <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left">Column 2                                    </div>
                                                                                    </td>
                                                                                    <td data-order="Column 3" class="elementor-repeater-item-9baadb4 ekit_table_data_">
                                                                                        <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left">Column 3                                    </div>
                                                                                    </td>
                                                                                <tr>
                                                                                    <td data-order="Column 1" class="elementor-repeater-item-69dc518 ekit_table_data_">
                                                                                        <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left">Column 1                                    </div>
                                                                                    </td>
                                                                                    <td data-order="Column 2" class="elementor-repeater-item-4e53d97 ekit_table_data_">
                                                                                        <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left">Column 2                                    </div>
                                                                                    </td>
                                                                                    <td data-order="Column 3" class="elementor-repeater-item-bcf5e53 ekit_table_data_">
                                                                                        <div class="ekit_table_body_container ekit_table_data_ ekit_body_align_left">Column 3                                    </div>
                                                                                    </td>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-elementor-type="popup" data-elementor-id="14303" class="elementor elementor-14303 elementor-location-popup" data-elementor-settings="{&quot;entrance_animation&quot;:&quot;zoomIn&quot;,&quot;entrance_animation_duration&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0.15,&quot;sizes&quot;:[]},&quot;prevent_scroll&quot;:&quot;yes&quot;,&quot;avoid_multiple_popups&quot;:&quot;yes&quot;,&quot;exit_animation&quot;:&quot;zoomIn&quot;,&quot;prevent_close_on_background_click&quot;:&quot;yes&quot;,&quot;prevent_close_on_esc_key&quot;:&quot;yes&quot;,&quot;a11y_navigation&quot;:&quot;yes&quot;,&quot;timing&quot;:[]}" data-elementor-post-type="elementor_library">
            <div class="elementor-section-wrap">
                <div class="elementor-element elementor-element-1e28827 e-flex e-con-boxed e-con e-parent" data-id="1e28827" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-59e7f7d e-grid vehicles-active e-con-full e-con e-child" data-id="59e7f7d" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;grid&quot;,&quot;grid_columns_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;full&quot;,&quot;grid_columns_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_columns_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_rows_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_auto_flow&quot;:&quot;row&quot;,&quot;grid_auto_flow_tablet&quot;:&quot;row&quot;,&quot;grid_auto_flow_mobile&quot;:&quot;row&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                            <div class="elementor-element elementor-element-bb4182f e-grid e-con-boxed e-con e-child" data-id="bb4182f" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;grid&quot;,&quot;grid_columns_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;content_width&quot;:&quot;boxed&quot;,&quot;grid_outline&quot;:&quot;yes&quot;,&quot;grid_columns_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_columns_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_rows_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_auto_flow&quot;:&quot;row&quot;,&quot;grid_auto_flow_tablet&quot;:&quot;row&quot;,&quot;grid_auto_flow_mobile&quot;:&quot;row&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                <div class="e-con-inner">
                                    <div class="elementor-element elementor-element-d8558da e-flex e-con-boxed e-con e-child" data-id="d8558da" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                        <div class="e-con-inner">
                                            <div class="elementor-element elementor-element-59e837f elementor-widget elementor-widget-heading" data-id="59e837f" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h2 class="elementor-heading-title elementor-size-default">Create 911 call</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-43cfe28 e-flex e-con-boxed e-con e-child" data-id="43cfe28" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
                                        <div class="e-con-inner">
                                            <div class="elementor-element elementor-element-4e570a0 form elementor-button-align-stretch elementor-widget elementor-widget-form" data-id="4e570a0" data-element_type="widget" data-settings="{&quot;step_next_label&quot;:&quot;Next&quot;,&quot;step_previous_label&quot;:&quot;Previous&quot;,&quot;button_width&quot;:&quot;100&quot;,&quot;step_type&quot;:&quot;number_text&quot;,&quot;step_icon_shape&quot;:&quot;circle&quot;,&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="form.default">
                                                <div class="elementor-widget-container">
                                                    <form class="elementor-form" method="post" id="submitreport" name="create-911" novalidate="">
                                                        <input type="hidden" name="post_id" value="14303"/>
                                                        <input type="hidden" name="form_id" value="4e570a0"/>
                                                        <input type="hidden" name="referer_title" value="c-mdt-civilianSelected"/>
                                                        <input type="hidden" name="queried_id" value="13542"/>
                                                        <div class="elementor-form-fields-wrapper elementor-labels-above">
                                                            <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-name elementor-col-100 elementor-field-required">
                                                                <label for="form-field-name" class="elementor-field-label">Service(s) Required							</label>
                                                                <div class="elementor-field elementor-select-wrapper remove-before">
                                                                    <div class="select-caret-down-wrapper">
                                                                        <svg aria-hidden="true" class="e-font-icon-svg e-eicon-caret-down" viewbox="0 0 571.4 571.4" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M571 393Q571 407 561 418L311 668Q300 679 286 679T261 668L11 418Q0 407 0 393T11 368 36 357H536Q550 357 561 368T571 393Z"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <select name="form_fields[name]" id="form-field-name" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
                                                                        <option value="Police">Police</option>
                                                                        <option value="Fire &amp; Rescue">Fire &amp;Rescue</option>
                                                                        <option value="Police + Fire &amp; Rescue">Police + Fire &amp;Rescue</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_0e836ed elementor-col-100 elementor-field-required">
                                                                <label for="form-field-field_0e836ed" class="elementor-field-label">Call Title							</label>
                                                                <input size="1" type="text" name="form_fields[field_0e836ed]" id="form-field-field_0e836ed" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="e.g. Structure Fire" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_1b41415 elementor-col-70 elementor-field-required">
                                                                <label for="form-field-field_1b41415" class="elementor-field-label">Call Location							</label>
                                                                <input size="1" type="text" name="form_fields[field_1b41415]" id="form-field-field_1b41415" class="elementor-field elementor-size-sm  elementor-field-textual" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_60a820e elementor-col-30 elementor-field-required">
                                                                <label for="form-field-field_60a820e" class="elementor-field-label">Call Postal							</label>
                                                                <input size="1" type="text" name="form_fields[field_60a820e]" id="form-field-field_60a820e" class="elementor-field elementor-size-sm  elementor-field-textual" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-textarea elementor-field-group elementor-column elementor-field-group-field_7627d21 elementor-col-100 elementor-field-required">
                                                                <label for="form-field-field_7627d21" class="elementor-field-label">Call Description							</label>
                                                                <textarea class="elementor-field-textual elementor-field  elementor-size-sm" name="form_fields[field_7627d21]" id="form-field-field_7627d21" rows="4" required="required" aria-required="true"></textarea>
                                                            </div>
                                                            <div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100 e-form__buttons">
                                                                <button type="submit" class="elementor-button elementor-size-sm">
                                                                    <span>
                                                                        <span class="elementor-button-icon"></span>
                                                                        <span class="elementor-button-text">Create Call</span>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-elementor-type="popup" data-elementor-id="14078" class="elementor elementor-14078 elementor-location-popup" data-elementor-settings="{&quot;entrance_animation&quot;:&quot;zoomIn&quot;,&quot;entrance_animation_duration&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0.15,&quot;sizes&quot;:[]},&quot;prevent_scroll&quot;:&quot;yes&quot;,&quot;avoid_multiple_popups&quot;:&quot;yes&quot;,&quot;exit_animation&quot;:&quot;zoomIn&quot;,&quot;prevent_close_on_background_click&quot;:&quot;yes&quot;,&quot;prevent_close_on_esc_key&quot;:&quot;yes&quot;,&quot;a11y_navigation&quot;:&quot;yes&quot;,&quot;timing&quot;:[]}" data-elementor-post-type="elementor_library">
            <div class="elementor-section-wrap">
                <div class="elementor-element elementor-element-1e28827 e-flex e-con-boxed e-con e-parent" data-id="1e28827" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-59e7f7d e-grid vehicles-active e-con-full e-con e-parent" data-id="59e7f7d" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;grid&quot;,&quot;grid_columns_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;full&quot;,&quot;grid_columns_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_columns_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_rows_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_auto_flow&quot;:&quot;row&quot;,&quot;grid_auto_flow_tablet&quot;:&quot;row&quot;,&quot;grid_auto_flow_mobile&quot;:&quot;row&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                            <div class="elementor-element elementor-element-bb4182f e-grid e-con-boxed e-con e-parent" data-id="bb4182f" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;grid&quot;,&quot;grid_columns_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;content_width&quot;:&quot;boxed&quot;,&quot;grid_outline&quot;:&quot;yes&quot;,&quot;grid_columns_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_columns_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_rows_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_auto_flow&quot;:&quot;row&quot;,&quot;grid_auto_flow_tablet&quot;:&quot;row&quot;,&quot;grid_auto_flow_mobile&quot;:&quot;row&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                                <div class="e-con-inner">
                                    <div class="elementor-element elementor-element-d8558da e-flex e-con-boxed e-con e-parent" data-id="d8558da" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                                        <div class="e-con-inner">
                                            <div class="elementor-element elementor-element-59e837f elementor-widget elementor-widget-heading" data-id="59e837f" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h2 class="elementor-heading-title elementor-size-default">Update Vehicle</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-43cfe28 e-flex e-con-boxed e-con e-parent" data-id="43cfe28" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                                        <div class="e-con-inner">
                                            <div class="elementor-element elementor-element-4e570a0 form elementor-button-align-stretch elementor-widget elementor-widget-form" data-id="4e570a0" data-element_type="widget" data-settings="{&quot;step_next_label&quot;:&quot;Next&quot;,&quot;step_previous_label&quot;:&quot;Previous&quot;,&quot;button_width&quot;:&quot;100&quot;,&quot;step_type&quot;:&quot;number_text&quot;,&quot;step_icon_shape&quot;:&quot;circle&quot;,&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="form.default">
                                                <div class="elementor-widget-container">
                                                    <form class="elementor-form" method="post" id="submitreport" name="edit-vehicle" novalidate="">
                                                        <input type="hidden" name="post_id" value="14078"/>
                                                        <input type="hidden" name="form_id" value="4e570a0"/>
                                                        <input type="hidden" name="referer_title" value="c-mdt-civilianSelected"/>
                                                        <input type="hidden" name="queried_id" value="13542"/>
                                                        <div class="elementor-form-fields-wrapper elementor-labels-above">
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100 elementor-field-required">
                                                                <label for="form-field-name" class="elementor-field-label">Plate							</label>
                                                                <input size="1" type="text" name="form_fields[name]" id="form-field-name" class="elementor-field elementor-size-sm  elementor-field-textual" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_5777540 elementor-col-100 elementor-field-required">
                                                                <label for="form-field-field_5777540" class="elementor-field-label">Model							</label>
                                                                <input size="1" type="text" name="form_fields[field_5777540]" id="form-field-field_5777540" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="e.g. Pegassi Zentorno" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_2126f95 elementor-col-100 elementor-field-required">
                                                                <label for="form-field-field_2126f95" class="elementor-field-label">Colour							</label>
                                                                <input size="1" type="text" name="form_fields[field_2126f95]" id="form-field-field_2126f95" class="elementor-field elementor-size-sm  elementor-field-textual" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_cdc20d7 elementor-col-100 elementor-field-required">
                                                                <label for="form-field-field_cdc20d7" class="elementor-field-label">Flags							</label>
                                                                <div class="elementor-field elementor-select-wrapper remove-before">
                                                                    <div class="select-caret-down-wrapper">
                                                                        <svg aria-hidden="true" class="e-font-icon-svg e-eicon-caret-down" viewbox="0 0 571.4 571.4" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M571 393Q571 407 561 418L311 668Q300 679 286 679T261 668L11 418Q0 407 0 393T11 368 36 357H536Q550 357 561 368T571 393Z"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <select name="form_fields[field_cdc20d7]" id="form-field-field_cdc20d7" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
                                                                        <option value="None">None</option>
                                                                        <option value="Stolen">Stolen</option>
                                                                        <option value="Wanted">Wanted</option>
                                                                        <option value="Suspended Registration">Suspended Registration</option>
                                                                        <option value="Cancelled Registration">Cancelled Registration</option>
                                                                        <option value="Expired Registration">Expired Registration</option>
                                                                        <option value="Insurance Flags">Insurance Flags</option>
                                                                        <option value="Driver Flags">Driver Flags</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_7059373 elementor-col-50 elementor-field-required">
                                                                <label for="form-field-field_7059373" class="elementor-field-label">Registration Status							</label>
                                                                <div class="elementor-field elementor-select-wrapper remove-before">
                                                                    <div class="select-caret-down-wrapper">
                                                                        <svg aria-hidden="true" class="e-font-icon-svg e-eicon-caret-down" viewbox="0 0 571.4 571.4" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M571 393Q571 407 561 418L311 668Q300 679 286 679T261 668L11 418Q0 407 0 393T11 368 36 357H536Q550 357 561 368T571 393Z"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <select name="form_fields[field_7059373]" id="form-field-field_7059373" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
                                                                        <option value="None">None</option>
                                                                        <option value="Valid">Valid</option>
                                                                        <option value="Invalid">Invalid</option>
                                                                        <option value="Expired">Expired</option>
                                                                        <option value="Suspended">Suspended</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_521a8bd elementor-col-50 elementor-field-required">
                                                                <label for="form-field-field_521a8bd" class="elementor-field-label">Insurance Status							</label>
                                                                <div class="elementor-field elementor-select-wrapper remove-before">
                                                                    <div class="select-caret-down-wrapper">
                                                                        <svg aria-hidden="true" class="e-font-icon-svg e-eicon-caret-down" viewbox="0 0 571.4 571.4" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M571 393Q571 407 561 418L311 668Q300 679 286 679T261 668L11 418Q0 407 0 393T11 368 36 357H536Q550 357 561 368T571 393Z"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <select name="form_fields[field_521a8bd]" id="form-field-field_521a8bd" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
                                                                        <option value="None">None</option>
                                                                        <option value="Valid">Valid</option>
                                                                        <option value="Invalid">Invalid</option>
                                                                        <option value="Expired">Expired</option>
                                                                        <option value="Suspended">Suspended</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_19b1d27 elementor-col-50 elementor-field-required">
                                                                <label for="form-field-field_19b1d27" class="elementor-field-label">Inspection Status							</label>
                                                                <div class="elementor-field elementor-select-wrapper remove-before">
                                                                    <div class="select-caret-down-wrapper">
                                                                        <svg aria-hidden="true" class="e-font-icon-svg e-eicon-caret-down" viewbox="0 0 571.4 571.4" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M571 393Q571 407 561 418L311 668Q300 679 286 679T261 668L11 418Q0 407 0 393T11 368 36 357H536Q550 357 561 368T571 393Z"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <select name="form_fields[field_19b1d27]" id="form-field-field_19b1d27" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
                                                                        <option value="Passed">Passed</option>
                                                                        <option value="Failed">Failed</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_45f9481 elementor-col-50 elementor-field-required">
                                                                <label for="form-field-field_45f9481" class="elementor-field-label">Tax Status							</label>
                                                                <div class="elementor-field elementor-select-wrapper remove-before">
                                                                    <div class="select-caret-down-wrapper">
                                                                        <svg aria-hidden="true" class="e-font-icon-svg e-eicon-caret-down" viewbox="0 0 571.4 571.4" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M571 393Q571 407 561 418L311 668Q300 679 286 679T261 668L11 418Q0 407 0 393T11 368 36 357H536Q550 357 561 368T571 393Z"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <select name="form_fields[field_45f9481]" id="form-field-field_45f9481" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
                                                                        <option value="Taxed">Taxed</option>
                                                                        <option value="Untaxed">Untaxed</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100 e-form__buttons">
                                                                <button type="submit" class="elementor-button elementor-size-sm">
                                                                    <span>
                                                                        <span class="elementor-button-icon"></span>
                                                                        <span class="elementor-button-text">Update Vehicle</span>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-elementor-type="popup" data-elementor-id="14014" class="elementor elementor-14014 elementor-location-popup" data-elementor-settings="{&quot;entrance_animation&quot;:&quot;zoomIn&quot;,&quot;entrance_animation_duration&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0.15,&quot;sizes&quot;:[]},&quot;prevent_scroll&quot;:&quot;yes&quot;,&quot;avoid_multiple_popups&quot;:&quot;yes&quot;,&quot;exit_animation&quot;:&quot;zoomIn&quot;,&quot;prevent_close_on_background_click&quot;:&quot;yes&quot;,&quot;prevent_close_on_esc_key&quot;:&quot;yes&quot;,&quot;a11y_navigation&quot;:&quot;yes&quot;,&quot;timing&quot;:[]}" data-elementor-post-type="elementor_library">
            <div class="elementor-section-wrap">
                <div class="elementor-element elementor-element-1e28827 e-flex e-con-boxed e-con e-parent" data-id="1e28827" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-59e7f7d e-grid vehicles-active e-con-full e-con e-parent" data-id="59e7f7d" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;grid&quot;,&quot;grid_columns_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;full&quot;,&quot;grid_columns_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_columns_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_rows_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_auto_flow&quot;:&quot;row&quot;,&quot;grid_auto_flow_tablet&quot;:&quot;row&quot;,&quot;grid_auto_flow_mobile&quot;:&quot;row&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                            <div class="elementor-element elementor-element-bb4182f e-grid e-con-boxed e-con e-parent" data-id="bb4182f" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;grid&quot;,&quot;grid_columns_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;content_width&quot;:&quot;boxed&quot;,&quot;grid_outline&quot;:&quot;yes&quot;,&quot;grid_columns_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_columns_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_rows_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_auto_flow&quot;:&quot;row&quot;,&quot;grid_auto_flow_tablet&quot;:&quot;row&quot;,&quot;grid_auto_flow_mobile&quot;:&quot;row&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                                <div class="e-con-inner">
                                    <div class="elementor-element elementor-element-d8558da e-flex e-con-boxed e-con e-parent" data-id="d8558da" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                                        <div class="e-con-inner">
                                            <div class="elementor-element elementor-element-59e837f elementor-widget elementor-widget-heading" data-id="59e837f" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h2 class="elementor-heading-title elementor-size-default">Edit Character</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-43cfe28 e-flex e-con-boxed e-con e-parent" data-id="43cfe28" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                                        <div class="e-con-inner">
                                            <div class="elementor-element elementor-element-4e570a0 form elementor-button-align-stretch elementor-widget elementor-widget-form" data-id="4e570a0" data-element_type="widget" data-settings="{&quot;step_next_label&quot;:&quot;Next&quot;,&quot;step_previous_label&quot;:&quot;Previous&quot;,&quot;button_width&quot;:&quot;100&quot;,&quot;step_type&quot;:&quot;number_text&quot;,&quot;step_icon_shape&quot;:&quot;circle&quot;,&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="form.default">
                                                <div class="elementor-widget-container">
                                                    <form class="elementor-form" method="post" id="submitreport" name="create-char" novalidate="">
                                                        <input type="hidden" name="post_id" value="14014"/>
                                                        <input type="hidden" name="form_id" value="4e570a0"/>
                                                        <input type="hidden" name="referer_title" value="c-mdt-civilianSelected"/>
                                                        <input type="hidden" name="queried_id" value="13542"/>
                                                        <div class="elementor-form-fields-wrapper elementor-labels-above">
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-50 elementor-field-required elementor-mark-required">
                                                                <label for="form-field-name" class="elementor-field-label">Name							</label>
                                                                <input size="1" type="text" name="form_fields[name]" id="form-field-name" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="e.g. Marzus Lowbridge" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-date elementor-field-group elementor-column elementor-field-group-field_70a92ab elementor-col-50 elementor-field-required elementor-mark-required">
                                                                <label for="form-field-field_70a92ab" class="elementor-field-label">Date of Birth							</label>
                                                                <input type="date" name="form_fields[field_70a92ab]" id="form-field-field_70a92ab" class="elementor-field elementor-size-sm  elementor-field-textual elementor-date-field elementor-use-native" placeholder="e.g. 28-10-2004" required="required" aria-required="true" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_32f4a27 elementor-col-50 elementor-field-required elementor-mark-required">
                                                                <label for="form-field-field_32f4a27" class="elementor-field-label">Hair Colour							</label>
                                                                <input size="1" type="text" name="form_fields[field_32f4a27]" id="form-field-field_32f4a27" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="e.g. Brown" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_a2a9e85 elementor-col-50 elementor-field-required elementor-mark-required">
                                                                <label for="form-field-field_a2a9e85" class="elementor-field-label">Eye Colour							</label>
                                                                <input size="1" type="text" name="form_fields[field_a2a9e85]" id="form-field-field_a2a9e85" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="e.g. Brown" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_aeeadb7 elementor-col-50 elementor-field-required elementor-mark-required">
                                                                <label for="form-field-field_aeeadb7" class="elementor-field-label">Weight (lbs)							</label>
                                                                <input size="1" type="text" name="form_fields[field_aeeadb7]" id="form-field-field_aeeadb7" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="e.g. 120" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_821fc71 elementor-col-50 elementor-field-required elementor-mark-required">
                                                                <label for="form-field-field_821fc71" class="elementor-field-label">Height (ft)							</label>
                                                                <input size="1" type="text" name="form_fields[field_821fc71]" id="form-field-field_821fc71" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="e.g. 6&#039;2" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_c6f7bb0 elementor-col-50 elementor-field-required elementor-mark-required">
                                                                <label for="form-field-field_c6f7bb0" class="elementor-field-label">Address							</label>
                                                                <input size="1" type="text" name="form_fields[field_c6f7bb0]" id="form-field-field_c6f7bb0" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="e.g. 2000 Eclipse Avenue" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_7ee9071 elementor-col-50 elementor-field-required elementor-mark-required">
                                                                <label for="form-field-field_7ee9071" class="elementor-field-label">Gender							</label>
                                                                <div class="elementor-field elementor-select-wrapper remove-before">
                                                                    <div class="select-caret-down-wrapper">
                                                                        <svg aria-hidden="true" class="e-font-icon-svg e-eicon-caret-down" viewbox="0 0 571.4 571.4" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M571 393Q571 407 561 418L311 668Q300 679 286 679T261 668L11 418Q0 407 0 393T11 368 36 357H536Q550 357 561 368T571 393Z"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <select name="form_fields[field_7ee9071]" id="form-field-field_7ee9071" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
                                                                        <option value="Male">Male</option>
                                                                        <option value="Female">Female</option>
                                                                        <option value="Other">Other</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_1bd7354 elementor-col-50 elementor-field-required elementor-mark-required">
                                                                <label for="form-field-field_1bd7354" class="elementor-field-label">Race							</label>
                                                                <input size="1" type="text" name="form_fields[field_1bd7354]" id="form-field-field_1bd7354" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="e.g. White, Asian, Black" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_a8f6259 elementor-col-50 elementor-field-required elementor-mark-required">
                                                                <label for="form-field-field_a8f6259" class="elementor-field-label">Build							</label>
                                                                <input size="1" type="text" name="form_fields[field_a8f6259]" id="form-field-field_a8f6259" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="e.g. Averarge, Slim, Muscular, Fit, Overweight" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_5723783 elementor-col-100 elementor-field-required elementor-mark-required">
                                                                <label for="form-field-field_5723783" class="elementor-field-label">Occupation							</label>
                                                                <input size="1" type="text" name="form_fields[field_5723783]" id="form-field-field_5723783" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="e.g. Unemployed, Self-Employed" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100 e-form__buttons">
                                                                <button type="submit" class="elementor-button elementor-size-sm">
                                                                    <span>
                                                                        <span class="elementor-button-icon"></span>
                                                                        <span class="elementor-button-text">Update Character</span>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-elementor-type="popup" data-elementor-id="14052" class="elementor elementor-14052 elementor-location-popup" data-elementor-settings="{&quot;entrance_animation&quot;:&quot;zoomIn&quot;,&quot;entrance_animation_duration&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0.15,&quot;sizes&quot;:[]},&quot;prevent_scroll&quot;:&quot;yes&quot;,&quot;avoid_multiple_popups&quot;:&quot;yes&quot;,&quot;exit_animation&quot;:&quot;zoomIn&quot;,&quot;prevent_close_on_background_click&quot;:&quot;yes&quot;,&quot;prevent_close_on_esc_key&quot;:&quot;yes&quot;,&quot;a11y_navigation&quot;:&quot;yes&quot;,&quot;timing&quot;:[]}" data-elementor-post-type="elementor_library">
            <div class="elementor-section-wrap">
                <div class="elementor-element elementor-element-1e28827 e-flex e-con-boxed e-con e-parent" data-id="1e28827" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-59e7f7d e-grid vehicles-active e-con-full e-con e-parent" data-id="59e7f7d" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;grid&quot;,&quot;grid_columns_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;full&quot;,&quot;grid_columns_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_columns_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_rows_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_auto_flow&quot;:&quot;row&quot;,&quot;grid_auto_flow_tablet&quot;:&quot;row&quot;,&quot;grid_auto_flow_mobile&quot;:&quot;row&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                            <div class="elementor-element elementor-element-bb4182f e-grid e-con-boxed e-con e-parent" data-id="bb4182f" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;grid&quot;,&quot;grid_columns_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;content_width&quot;:&quot;boxed&quot;,&quot;grid_outline&quot;:&quot;yes&quot;,&quot;grid_columns_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_columns_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_rows_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_auto_flow&quot;:&quot;row&quot;,&quot;grid_auto_flow_tablet&quot;:&quot;row&quot;,&quot;grid_auto_flow_mobile&quot;:&quot;row&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                                <div class="e-con-inner">
                                    <div class="elementor-element elementor-element-d8558da e-flex e-con-boxed e-con e-parent" data-id="d8558da" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                                        <div class="e-con-inner">
                                            <div class="elementor-element elementor-element-59e837f elementor-widget elementor-widget-heading" data-id="59e837f" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h2 class="elementor-heading-title elementor-size-default">Edit Licenses</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-43cfe28 e-flex e-con-boxed e-con e-parent" data-id="43cfe28" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                                        <div class="e-con-inner">
                                            <div class="elementor-element elementor-element-4e570a0 form elementor-button-align-stretch elementor-widget elementor-widget-form" data-id="4e570a0" data-element_type="widget" data-settings="{&quot;step_next_label&quot;:&quot;Next&quot;,&quot;step_previous_label&quot;:&quot;Previous&quot;,&quot;button_width&quot;:&quot;100&quot;,&quot;step_type&quot;:&quot;number_text&quot;,&quot;step_icon_shape&quot;:&quot;circle&quot;,&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="form.default">
                                                <div class="elementor-widget-container">
                                                    <form class="elementor-form" method="post" id="submitreport" name="edit-license" novalidate="">
                                                        <input type="hidden" name="post_id" value="14052"/>
                                                        <input type="hidden" name="form_id" value="4e570a0"/>
                                                        <input type="hidden" name="referer_title" value="c-mdt-civilianSelected"/>
                                                        <input type="hidden" name="queried_id" value="13542"/>
                                                        <div class="elementor-form-fields-wrapper elementor-labels-above">
                                                            <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-name elementor-col-100 elementor-field-required">
                                                                <label for="form-field-name" class="elementor-field-label">License Type							</label>
                                                                <div class="elementor-field elementor-select-wrapper remove-before">
                                                                    <div class="select-caret-down-wrapper">
                                                                        <svg aria-hidden="true" class="e-font-icon-svg e-eicon-caret-down" viewbox="0 0 571.4 571.4" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M571 393Q571 407 561 418L311 668Q300 679 286 679T261 668L11 418Q0 407 0 393T11 368 36 357H536Q550 357 561 368T571 393Z"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <select name="form_fields[name]" id="form-field-name" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
                                                                        <option value="Drivers License">Drivers License</option>
                                                                        <option value="Weapons License">Weapons License</option>
                                                                        <option value="Commercial License">Commercial License</option>
                                                                        <option value="Hunting License">Hunting License</option>
                                                                        <option value="Fishing License">Fishing License</option>
                                                                        <option value="Aviation License">Aviation License</option>
                                                                        <option value="Boating License">Boating License</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_70a92ab elementor-col-100 elementor-field-required">
                                                                <label for="form-field-field_70a92ab" class="elementor-field-label">License Status							</label>
                                                                <div class="elementor-field elementor-select-wrapper remove-before">
                                                                    <div class="select-caret-down-wrapper">
                                                                        <svg aria-hidden="true" class="e-font-icon-svg e-eicon-caret-down" viewbox="0 0 571.4 571.4" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M571 393Q571 407 561 418L311 668Q300 679 286 679T261 668L11 418Q0 407 0 393T11 368 36 357H536Q550 357 561 368T571 393Z"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <select name="form_fields[field_70a92ab]" id="form-field-field_70a92ab" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
                                                                        <option value="Unobtained">Unobtained</option>
                                                                        <option value="Valid">Valid</option>
                                                                        <option value="Invalid">Invalid</option>
                                                                        <option value="Suspended">Suspended</option>
                                                                        <option value="Revoked">Revoked</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100 e-form__buttons">
                                                                <button type="submit" class="elementor-button elementor-size-sm">
                                                                    <span>
                                                                        <span class="elementor-button-icon"></span>
                                                                        <span class="elementor-button-text">Update License</span>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-elementor-type="popup" data-elementor-id="14063" class="elementor elementor-14063 elementor-location-popup" data-elementor-settings="{&quot;entrance_animation&quot;:&quot;zoomIn&quot;,&quot;entrance_animation_duration&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0.15,&quot;sizes&quot;:[]},&quot;prevent_scroll&quot;:&quot;yes&quot;,&quot;avoid_multiple_popups&quot;:&quot;yes&quot;,&quot;exit_animation&quot;:&quot;zoomIn&quot;,&quot;prevent_close_on_background_click&quot;:&quot;yes&quot;,&quot;prevent_close_on_esc_key&quot;:&quot;yes&quot;,&quot;a11y_navigation&quot;:&quot;yes&quot;,&quot;timing&quot;:[]}" data-elementor-post-type="elementor_library">
            <div class="elementor-section-wrap">
                <div class="elementor-element elementor-element-1e28827 e-flex e-con-boxed e-con e-parent" data-id="1e28827" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-59e7f7d e-grid vehicles-active e-con-full e-con e-parent" data-id="59e7f7d" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;grid&quot;,&quot;grid_columns_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;full&quot;,&quot;grid_columns_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_columns_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_rows_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_auto_flow&quot;:&quot;row&quot;,&quot;grid_auto_flow_tablet&quot;:&quot;row&quot;,&quot;grid_auto_flow_mobile&quot;:&quot;row&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                            <div class="elementor-element elementor-element-bb4182f e-grid e-con-boxed e-con e-parent" data-id="bb4182f" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;grid&quot;,&quot;grid_columns_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;content_width&quot;:&quot;boxed&quot;,&quot;grid_outline&quot;:&quot;yes&quot;,&quot;grid_columns_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_columns_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_rows_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_auto_flow&quot;:&quot;row&quot;,&quot;grid_auto_flow_tablet&quot;:&quot;row&quot;,&quot;grid_auto_flow_mobile&quot;:&quot;row&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                                <div class="e-con-inner">
                                    <div class="elementor-element elementor-element-d8558da e-flex e-con-boxed e-con e-parent" data-id="d8558da" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                                        <div class="e-con-inner">
                                            <div class="elementor-element elementor-element-59e837f elementor-widget elementor-widget-heading" data-id="59e837f" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h2 class="elementor-heading-title elementor-size-default">Edit Medical Information</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-43cfe28 e-flex e-con-boxed e-con e-parent" data-id="43cfe28" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                                        <div class="e-con-inner">
                                            <div class="elementor-element elementor-element-4e570a0 form elementor-button-align-stretch elementor-widget elementor-widget-form" data-id="4e570a0" data-element_type="widget" data-settings="{&quot;step_next_label&quot;:&quot;Next&quot;,&quot;step_previous_label&quot;:&quot;Previous&quot;,&quot;button_width&quot;:&quot;100&quot;,&quot;step_type&quot;:&quot;number_text&quot;,&quot;step_icon_shape&quot;:&quot;circle&quot;,&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="form.default">
                                                <div class="elementor-widget-container">
                                                    <form class="elementor-form" method="post" id="submitreport" name="edit-medical" novalidate="">
                                                        <input type="hidden" name="post_id" value="14063"/>
                                                        <input type="hidden" name="form_id" value="4e570a0"/>
                                                        <input type="hidden" name="referer_title" value="c-mdt-civilianSelected"/>
                                                        <input type="hidden" name="queried_id" value="13542"/>
                                                        <div class="elementor-form-fields-wrapper elementor-labels-above">
                                                            <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-name elementor-col-100 elementor-field-required">
                                                                <label for="form-field-name" class="elementor-field-label">Blood Type							</label>
                                                                <div class="elementor-field elementor-select-wrapper remove-before">
                                                                    <div class="select-caret-down-wrapper">
                                                                        <svg aria-hidden="true" class="e-font-icon-svg e-eicon-caret-down" viewbox="0 0 571.4 571.4" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M571 393Q571 407 561 418L311 668Q300 679 286 679T261 668L11 418Q0 407 0 393T11 368 36 357H536Q550 357 561 368T571 393Z"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <select name="form_fields[name]" id="form-field-name" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
                                                                        <option value="AB-">AB-</option>
                                                                        <option value="O+">O+</option>
                                                                        <option value="O-">O-</option>
                                                                        <option value="A+">A+</option>
                                                                        <option value="A-">A-</option>
                                                                        <option value="B+">B+</option>
                                                                        <option value="B-">B-</option>
                                                                        <option value="AB+">AB+</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_70a92ab elementor-col-100 elementor-field-required">
                                                                <label for="form-field-field_70a92ab" class="elementor-field-label">Emergency Contact							</label>
                                                                <input size="1" type="text" name="form_fields[field_70a92ab]" id="form-field-field_70a92ab" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="e.g. 911" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_09ec99a elementor-col-100 elementor-field-required">
                                                                <label for="form-field-field_09ec99a" class="elementor-field-label">Allergies							</label>
                                                                <input size="1" type="text" name="form_fields[field_09ec99a]" id="form-field-field_09ec99a" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="e.g. Cats, Dogs, Peanuts" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_eb5e196 elementor-col-100 elementor-field-required">
                                                                <label for="form-field-field_eb5e196" class="elementor-field-label">Medication							</label>
                                                                <input size="1" type="text" name="form_fields[field_eb5e196]" id="form-field-field_eb5e196" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="e.g. Any medications you may require." required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_08e9cfd elementor-col-100 elementor-field-required">
                                                                <label for="form-field-field_08e9cfd" class="elementor-field-label">Organ Donor							</label>
                                                                <div class="elementor-field elementor-select-wrapper remove-before">
                                                                    <div class="select-caret-down-wrapper">
                                                                        <svg aria-hidden="true" class="e-font-icon-svg e-eicon-caret-down" viewbox="0 0 571.4 571.4" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M571 393Q571 407 561 418L311 668Q300 679 286 679T261 668L11 418Q0 407 0 393T11 368 36 357H536Q550 357 561 368T571 393Z"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <select name="form_fields[field_08e9cfd]" id="form-field-field_08e9cfd" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
                                                                        <option value="No">No</option>
                                                                        <option value="Yes">Yes</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100 e-form__buttons">
                                                                <button type="submit" class="elementor-button elementor-size-sm">
                                                                    <span>
                                                                        <span class="elementor-button-icon"></span>
                                                                        <span class="elementor-button-text">Update Medical information</span>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-elementor-type="popup" data-elementor-id="14069" class="elementor elementor-14069 elementor-location-popup" data-elementor-settings="{&quot;entrance_animation&quot;:&quot;zoomIn&quot;,&quot;entrance_animation_duration&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0.15,&quot;sizes&quot;:[]},&quot;prevent_scroll&quot;:&quot;yes&quot;,&quot;avoid_multiple_popups&quot;:&quot;yes&quot;,&quot;exit_animation&quot;:&quot;zoomIn&quot;,&quot;prevent_close_on_background_click&quot;:&quot;yes&quot;,&quot;prevent_close_on_esc_key&quot;:&quot;yes&quot;,&quot;a11y_navigation&quot;:&quot;yes&quot;,&quot;timing&quot;:[]}" data-elementor-post-type="elementor_library">
            <div class="elementor-section-wrap">
                <div class="elementor-element elementor-element-1e28827 e-flex e-con-boxed e-con e-parent" data-id="1e28827" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-59e7f7d e-grid vehicles-active e-con-full e-con e-parent" data-id="59e7f7d" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;grid&quot;,&quot;grid_columns_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;full&quot;,&quot;grid_columns_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_columns_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_rows_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_auto_flow&quot;:&quot;row&quot;,&quot;grid_auto_flow_tablet&quot;:&quot;row&quot;,&quot;grid_auto_flow_mobile&quot;:&quot;row&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                            <div class="elementor-element elementor-element-bb4182f e-grid e-con-boxed e-con e-parent" data-id="bb4182f" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;grid&quot;,&quot;grid_columns_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;content_width&quot;:&quot;boxed&quot;,&quot;grid_outline&quot;:&quot;yes&quot;,&quot;grid_columns_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_columns_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_rows_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_auto_flow&quot;:&quot;row&quot;,&quot;grid_auto_flow_tablet&quot;:&quot;row&quot;,&quot;grid_auto_flow_mobile&quot;:&quot;row&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                                <div class="e-con-inner">
                                    <div class="elementor-element elementor-element-d8558da e-flex e-con-boxed e-con e-parent" data-id="d8558da" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                                        <div class="e-con-inner">
                                            <div class="elementor-element elementor-element-59e837f elementor-widget elementor-widget-heading" data-id="59e837f" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h2 class="elementor-heading-title elementor-size-default">Register Vehicle</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-43cfe28 e-flex e-con-boxed e-con e-parent" data-id="43cfe28" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                                        <div class="e-con-inner">
                                            <div class="elementor-element elementor-element-4e570a0 form elementor-button-align-stretch elementor-widget elementor-widget-form" data-id="4e570a0" data-element_type="widget" data-settings="{&quot;step_next_label&quot;:&quot;Next&quot;,&quot;step_previous_label&quot;:&quot;Previous&quot;,&quot;button_width&quot;:&quot;100&quot;,&quot;step_type&quot;:&quot;number_text&quot;,&quot;step_icon_shape&quot;:&quot;circle&quot;,&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="form.default">
                                                <div class="elementor-widget-container">
                                                    <form class="elementor-form" method="post" id="submitreport" name="edit-medical" novalidate="">
                                                        <input type="hidden" name="post_id" value="14069"/>
                                                        <input type="hidden" name="form_id" value="4e570a0"/>
                                                        <input type="hidden" name="referer_title" value="c-mdt-civilianSelected"/>
                                                        <input type="hidden" name="queried_id" value="13542"/>
                                                        <div class="elementor-form-fields-wrapper elementor-labels-above">
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100 elementor-field-required">
                                                                <label for="form-field-name" class="elementor-field-label">Plate							</label>
                                                                <input size="1" type="text" name="form_fields[name]" id="form-field-name" class="elementor-field elementor-size-sm  elementor-field-textual" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_5777540 elementor-col-100 elementor-field-required">
                                                                <label for="form-field-field_5777540" class="elementor-field-label">Model							</label>
                                                                <input size="1" type="text" name="form_fields[field_5777540]" id="form-field-field_5777540" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="e.g. Pegassi Zentorno" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_2126f95 elementor-col-100 elementor-field-required">
                                                                <label for="form-field-field_2126f95" class="elementor-field-label">Colour							</label>
                                                                <input size="1" type="text" name="form_fields[field_2126f95]" id="form-field-field_2126f95" class="elementor-field elementor-size-sm  elementor-field-textual" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_cdc20d7 elementor-col-100 elementor-field-required">
                                                                <label for="form-field-field_cdc20d7" class="elementor-field-label">Flags							</label>
                                                                <div class="elementor-field elementor-select-wrapper remove-before">
                                                                    <div class="select-caret-down-wrapper">
                                                                        <svg aria-hidden="true" class="e-font-icon-svg e-eicon-caret-down" viewbox="0 0 571.4 571.4" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M571 393Q571 407 561 418L311 668Q300 679 286 679T261 668L11 418Q0 407 0 393T11 368 36 357H536Q550 357 561 368T571 393Z"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <select name="form_fields[field_cdc20d7]" id="form-field-field_cdc20d7" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
                                                                        <option value="None">None</option>
                                                                        <option value="Stolen">Stolen</option>
                                                                        <option value="Wanted">Wanted</option>
                                                                        <option value="Suspended Registration">Suspended Registration</option>
                                                                        <option value="Cancelled Registration">Cancelled Registration</option>
                                                                        <option value="Expired Registration">Expired Registration</option>
                                                                        <option value="Insurance Flags">Insurance Flags</option>
                                                                        <option value="Driver Flags">Driver Flags</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_7059373 elementor-col-50 elementor-field-required">
                                                                <label for="form-field-field_7059373" class="elementor-field-label">Registration Status							</label>
                                                                <div class="elementor-field elementor-select-wrapper remove-before">
                                                                    <div class="select-caret-down-wrapper">
                                                                        <svg aria-hidden="true" class="e-font-icon-svg e-eicon-caret-down" viewbox="0 0 571.4 571.4" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M571 393Q571 407 561 418L311 668Q300 679 286 679T261 668L11 418Q0 407 0 393T11 368 36 357H536Q550 357 561 368T571 393Z"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <select name="form_fields[field_7059373]" id="form-field-field_7059373" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
                                                                        <option value="None">None</option>
                                                                        <option value="Valid">Valid</option>
                                                                        <option value="Invalid">Invalid</option>
                                                                        <option value="Expired">Expired</option>
                                                                        <option value="Suspended">Suspended</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_521a8bd elementor-col-50 elementor-field-required">
                                                                <label for="form-field-field_521a8bd" class="elementor-field-label">Insurance Status							</label>
                                                                <div class="elementor-field elementor-select-wrapper remove-before">
                                                                    <div class="select-caret-down-wrapper">
                                                                        <svg aria-hidden="true" class="e-font-icon-svg e-eicon-caret-down" viewbox="0 0 571.4 571.4" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M571 393Q571 407 561 418L311 668Q300 679 286 679T261 668L11 418Q0 407 0 393T11 368 36 357H536Q550 357 561 368T571 393Z"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <select name="form_fields[field_521a8bd]" id="form-field-field_521a8bd" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
                                                                        <option value="None">None</option>
                                                                        <option value="Valid">Valid</option>
                                                                        <option value="Invalid">Invalid</option>
                                                                        <option value="Expired">Expired</option>
                                                                        <option value="Suspended">Suspended</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_19b1d27 elementor-col-50 elementor-field-required">
                                                                <label for="form-field-field_19b1d27" class="elementor-field-label">Inspection Status							</label>
                                                                <div class="elementor-field elementor-select-wrapper remove-before">
                                                                    <div class="select-caret-down-wrapper">
                                                                        <svg aria-hidden="true" class="e-font-icon-svg e-eicon-caret-down" viewbox="0 0 571.4 571.4" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M571 393Q571 407 561 418L311 668Q300 679 286 679T261 668L11 418Q0 407 0 393T11 368 36 357H536Q550 357 561 368T571 393Z"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <select name="form_fields[field_19b1d27]" id="form-field-field_19b1d27" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
                                                                        <option value="Passed">Passed</option>
                                                                        <option value="Failed">Failed</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_45f9481 elementor-col-50 elementor-field-required">
                                                                <label for="form-field-field_45f9481" class="elementor-field-label">Tax Status							</label>
                                                                <div class="elementor-field elementor-select-wrapper remove-before">
                                                                    <div class="select-caret-down-wrapper">
                                                                        <svg aria-hidden="true" class="e-font-icon-svg e-eicon-caret-down" viewbox="0 0 571.4 571.4" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M571 393Q571 407 561 418L311 668Q300 679 286 679T261 668L11 418Q0 407 0 393T11 368 36 357H536Q550 357 561 368T571 393Z"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <select name="form_fields[field_45f9481]" id="form-field-field_45f9481" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
                                                                        <option value="Taxed">Taxed</option>
                                                                        <option value="Untaxed">Untaxed</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100 e-form__buttons">
                                                                <button type="submit" class="elementor-button elementor-size-sm">
                                                                    <span>
                                                                        <span class="elementor-button-icon"></span>
                                                                        <span class="elementor-button-text">Register Vehicle</span>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-elementor-type="popup" data-elementor-id="14091" class="elementor elementor-14091 elementor-location-popup" data-elementor-settings="{&quot;entrance_animation&quot;:&quot;zoomIn&quot;,&quot;entrance_animation_duration&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0.15,&quot;sizes&quot;:[]},&quot;prevent_scroll&quot;:&quot;yes&quot;,&quot;avoid_multiple_popups&quot;:&quot;yes&quot;,&quot;exit_animation&quot;:&quot;zoomIn&quot;,&quot;prevent_close_on_background_click&quot;:&quot;yes&quot;,&quot;prevent_close_on_esc_key&quot;:&quot;yes&quot;,&quot;a11y_navigation&quot;:&quot;yes&quot;,&quot;timing&quot;:[]}" data-elementor-post-type="elementor_library">
            <div class="elementor-section-wrap">
                <div class="elementor-element elementor-element-1e28827 e-flex e-con-boxed e-con e-parent" data-id="1e28827" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-59e7f7d e-grid vehicles-active e-con-full e-con e-parent" data-id="59e7f7d" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;grid&quot;,&quot;grid_columns_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;full&quot;,&quot;grid_columns_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_columns_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_rows_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_auto_flow&quot;:&quot;row&quot;,&quot;grid_auto_flow_tablet&quot;:&quot;row&quot;,&quot;grid_auto_flow_mobile&quot;:&quot;row&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                            <div class="elementor-element elementor-element-bb4182f e-grid e-con-boxed e-con e-parent" data-id="bb4182f" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;grid&quot;,&quot;grid_columns_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;content_width&quot;:&quot;boxed&quot;,&quot;grid_outline&quot;:&quot;yes&quot;,&quot;grid_columns_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_columns_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_rows_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_auto_flow&quot;:&quot;row&quot;,&quot;grid_auto_flow_tablet&quot;:&quot;row&quot;,&quot;grid_auto_flow_mobile&quot;:&quot;row&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                                <div class="e-con-inner">
                                    <div class="elementor-element elementor-element-d8558da e-flex e-con-boxed e-con e-parent" data-id="d8558da" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                                        <div class="e-con-inner">
                                            <div class="elementor-element elementor-element-59e837f elementor-widget elementor-widget-heading" data-id="59e837f" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h2 class="elementor-heading-title elementor-size-default">Edit Weapon</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-43cfe28 e-flex e-con-boxed e-con e-parent" data-id="43cfe28" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                                        <div class="e-con-inner">
                                            <div class="elementor-element elementor-element-4e570a0 form elementor-button-align-stretch elementor-widget elementor-widget-form" data-id="4e570a0" data-element_type="widget" data-settings="{&quot;step_next_label&quot;:&quot;Next&quot;,&quot;step_previous_label&quot;:&quot;Previous&quot;,&quot;button_width&quot;:&quot;100&quot;,&quot;step_type&quot;:&quot;number_text&quot;,&quot;step_icon_shape&quot;:&quot;circle&quot;,&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="form.default">
                                                <div class="elementor-widget-container">
                                                    <form class="elementor-form" method="post" id="submitreport" name="register-weapon" novalidate="">
                                                        <input type="hidden" name="post_id" value="14091"/>
                                                        <input type="hidden" name="form_id" value="4e570a0"/>
                                                        <input type="hidden" name="referer_title" value="c-mdt-civilianSelected"/>
                                                        <input type="hidden" name="queried_id" value="13542"/>
                                                        <div class="elementor-form-fields-wrapper elementor-labels-above">
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100 elementor-field-required">
                                                                <label for="form-field-name" class="elementor-field-label">Type							</label>
                                                                <input size="1" type="text" name="form_fields[name]" id="form-field-name" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="e.g. Handgun, Assault Rifle, Semi-Automatic Rifle" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_5777540 elementor-col-100 elementor-field-required">
                                                                <label for="form-field-field_5777540" class="elementor-field-label">Model							</label>
                                                                <input size="1" type="text" name="form_fields[field_5777540]" id="form-field-field_5777540" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="e.g. Glock 19, Carbine Rifle MK II" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_2126f95 elementor-col-100 elementor-field-required">
                                                                <label for="form-field-field_2126f95" class="elementor-field-label">Colour							</label>
                                                                <input size="1" type="text" name="form_fields[field_2126f95]" id="form-field-field_2126f95" class="elementor-field elementor-size-sm  elementor-field-textual" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_cdc20d7 elementor-col-100 elementor-field-required">
                                                                <label for="form-field-field_cdc20d7" class="elementor-field-label">Flags							</label>
                                                                <div class="elementor-field elementor-select-wrapper remove-before">
                                                                    <div class="select-caret-down-wrapper">
                                                                        <svg aria-hidden="true" class="e-font-icon-svg e-eicon-caret-down" viewbox="0 0 571.4 571.4" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M571 393Q571 407 561 418L311 668Q300 679 286 679T261 668L11 418Q0 407 0 393T11 368 36 357H536Q550 357 561 368T571 393Z"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <select name="form_fields[field_cdc20d7]" id="form-field-field_cdc20d7" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
                                                                        <option value="None">None</option>
                                                                        <option value="Stolen">Stolen</option>
                                                                        <option value="Wanted">Wanted</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_5fd8525 elementor-col-100 elementor-field-required">
                                                                <label for="form-field-field_5fd8525" class="elementor-field-label">Serial Number							</label>
                                                                <input size="1" type="text" name="form_fields[field_5fd8525]" id="form-field-field_5fd8525" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="Auto-Generated" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_0bcb3ee elementor-col-100">
                                                                <label for="form-field-field_0bcb3ee" class="elementor-field-label">Attachments (optional)							</label>
                                                                <input size="1" type="text" name="form_fields[field_0bcb3ee]" id="form-field-field_0bcb3ee" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="e.g. Suppressor, Grip, Flashlight">
                                                            </div>
                                                            <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_7059373 elementor-col-100 elementor-field-required">
                                                                <label for="form-field-field_7059373" class="elementor-field-label">Registration Status							</label>
                                                                <div class="elementor-field elementor-select-wrapper remove-before">
                                                                    <div class="select-caret-down-wrapper">
                                                                        <svg aria-hidden="true" class="e-font-icon-svg e-eicon-caret-down" viewbox="0 0 571.4 571.4" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M571 393Q571 407 561 418L311 668Q300 679 286 679T261 668L11 418Q0 407 0 393T11 368 36 357H536Q550 357 561 368T571 393Z"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <select name="form_fields[field_7059373]" id="form-field-field_7059373" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
                                                                        <option value="None">None</option>
                                                                        <option value="Valid">Valid</option>
                                                                        <option value="Invalid">Invalid</option>
                                                                        <option value="Expired">Expired</option>
                                                                        <option value="Suspended">Suspended</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100 e-form__buttons">
                                                                <button type="submit" class="elementor-button elementor-size-sm">
                                                                    <span>
                                                                        <span class="elementor-button-icon"></span>
                                                                        <span class="elementor-button-text">Update Weapon</span>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-elementor-type="popup" data-elementor-id="14084" class="elementor elementor-14084 elementor-location-popup" data-elementor-settings="{&quot;entrance_animation&quot;:&quot;zoomIn&quot;,&quot;entrance_animation_duration&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0.15,&quot;sizes&quot;:[]},&quot;prevent_scroll&quot;:&quot;yes&quot;,&quot;avoid_multiple_popups&quot;:&quot;yes&quot;,&quot;exit_animation&quot;:&quot;zoomIn&quot;,&quot;prevent_close_on_background_click&quot;:&quot;yes&quot;,&quot;prevent_close_on_esc_key&quot;:&quot;yes&quot;,&quot;a11y_navigation&quot;:&quot;yes&quot;,&quot;timing&quot;:[]}" data-elementor-post-type="elementor_library">
            <div class="elementor-section-wrap">
                <div class="elementor-element elementor-element-1e28827 e-flex e-con-boxed e-con e-parent" data-id="1e28827" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-59e7f7d e-grid vehicles-active e-con-full e-con e-parent" data-id="59e7f7d" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;grid&quot;,&quot;grid_columns_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;full&quot;,&quot;grid_columns_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_columns_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_rows_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_auto_flow&quot;:&quot;row&quot;,&quot;grid_auto_flow_tablet&quot;:&quot;row&quot;,&quot;grid_auto_flow_mobile&quot;:&quot;row&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                            <div class="elementor-element elementor-element-bb4182f e-grid e-con-boxed e-con e-parent" data-id="bb4182f" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;grid&quot;,&quot;grid_columns_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;content_width&quot;:&quot;boxed&quot;,&quot;grid_outline&quot;:&quot;yes&quot;,&quot;grid_columns_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_columns_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_rows_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_auto_flow&quot;:&quot;row&quot;,&quot;grid_auto_flow_tablet&quot;:&quot;row&quot;,&quot;grid_auto_flow_mobile&quot;:&quot;row&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                                <div class="e-con-inner">
                                    <div class="elementor-element elementor-element-d8558da e-flex e-con-boxed e-con e-parent" data-id="d8558da" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                                        <div class="e-con-inner">
                                            <div class="elementor-element elementor-element-59e837f elementor-widget elementor-widget-heading" data-id="59e837f" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h2 class="elementor-heading-title elementor-size-default">Register Weapon</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-43cfe28 e-flex e-con-boxed e-con e-parent" data-id="43cfe28" data-element_type="container" data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" data-core-v316-plus="true">
                                        <div class="e-con-inner">
                                            <div class="elementor-element elementor-element-4e570a0 form elementor-button-align-stretch elementor-widget elementor-widget-form" data-id="4e570a0" data-element_type="widget" data-settings="{&quot;step_next_label&quot;:&quot;Next&quot;,&quot;step_previous_label&quot;:&quot;Previous&quot;,&quot;button_width&quot;:&quot;100&quot;,&quot;step_type&quot;:&quot;number_text&quot;,&quot;step_icon_shape&quot;:&quot;circle&quot;,&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="form.default">
                                                <div class="elementor-widget-container">
                                                    <form class="elementor-form" method="post" id="submitreport" name="register-weapon" novalidate="">
                                                        <input type="hidden" name="post_id" value="14084"/>
                                                        <input type="hidden" name="form_id" value="4e570a0"/>
                                                        <input type="hidden" name="referer_title" value="c-mdt-civilianSelected"/>
                                                        <input type="hidden" name="queried_id" value="13542"/>
                                                        <div class="elementor-form-fields-wrapper elementor-labels-above">
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100 elementor-field-required">
                                                                <label for="form-field-name" class="elementor-field-label">Type							</label>
                                                                <input size="1" type="text" name="form_fields[name]" id="form-field-name" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="e.g. Handgun, Assault Rifle, Semi-Automatic Rifle" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_5777540 elementor-col-100 elementor-field-required">
                                                                <label for="form-field-field_5777540" class="elementor-field-label">Model							</label>
                                                                <input size="1" type="text" name="form_fields[field_5777540]" id="form-field-field_5777540" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="e.g. Glock 19, Carbine Rifle MK II" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_2126f95 elementor-col-100 elementor-field-required">
                                                                <label for="form-field-field_2126f95" class="elementor-field-label">Colour							</label>
                                                                <input size="1" type="text" name="form_fields[field_2126f95]" id="form-field-field_2126f95" class="elementor-field elementor-size-sm  elementor-field-textual" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_cdc20d7 elementor-col-100 elementor-field-required">
                                                                <label for="form-field-field_cdc20d7" class="elementor-field-label">Flags							</label>
                                                                <div class="elementor-field elementor-select-wrapper remove-before">
                                                                    <div class="select-caret-down-wrapper">
                                                                        <svg aria-hidden="true" class="e-font-icon-svg e-eicon-caret-down" viewbox="0 0 571.4 571.4" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M571 393Q571 407 561 418L311 668Q300 679 286 679T261 668L11 418Q0 407 0 393T11 368 36 357H536Q550 357 561 368T571 393Z"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <select name="form_fields[field_cdc20d7]" id="form-field-field_cdc20d7" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
                                                                        <option value="None">None</option>
                                                                        <option value="Stolen">Stolen</option>
                                                                        <option value="Wanted">Wanted</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_5fd8525 elementor-col-100 elementor-field-required">
                                                                <label for="form-field-field_5fd8525" class="elementor-field-label">Serial Number							</label>
                                                                <input size="1" type="text" name="form_fields[field_5fd8525]" id="form-field-field_5fd8525" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="Auto-Generated" required="required" aria-required="true">
                                                            </div>
                                                            <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_0bcb3ee elementor-col-100">
                                                                <label for="form-field-field_0bcb3ee" class="elementor-field-label">Attachments (optional)							</label>
                                                                <input size="1" type="text" name="form_fields[field_0bcb3ee]" id="form-field-field_0bcb3ee" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="e.g. Suppressor, Grip, Flashlight">
                                                            </div>
                                                            <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_7059373 elementor-col-100 elementor-field-required">
                                                                <label for="form-field-field_7059373" class="elementor-field-label">Registration Status							</label>
                                                                <div class="elementor-field elementor-select-wrapper remove-before">
                                                                    <div class="select-caret-down-wrapper">
                                                                        <svg aria-hidden="true" class="e-font-icon-svg e-eicon-caret-down" viewbox="0 0 571.4 571.4" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M571 393Q571 407 561 418L311 668Q300 679 286 679T261 668L11 418Q0 407 0 393T11 368 36 357H536Q550 357 561 368T571 393Z"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <select name="form_fields[field_7059373]" id="form-field-field_7059373" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
                                                                        <option value="None">None</option>
                                                                        <option value="Valid">Valid</option>
                                                                        <option value="Invalid">Invalid</option>
                                                                        <option value="Expired">Expired</option>
                                                                        <option value="Suspended">Suspended</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100 e-form__buttons">
                                                                <button type="submit" class="elementor-button elementor-size-sm">
                                                                    <span>
                                                                        <span class="elementor-button-icon"></span>
                                                                        <span class="elementor-button-text">Register Weapon</span>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            (function() {
                var c = document.body.className;
                c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
                document.body.className = c;
            }
            )();
        </script>
        <link rel='stylesheet' id='elementor-post-14303-css' href='./mdtCivilianSelected/css/elementor-css-post-14303.css' media='all'/>
        <link rel='stylesheet' id='elementor-post-14014-css' href='./mdtCivilianSelected/css/elementor-css-post-14014.css' media='all'/>
        <link rel='stylesheet' id='flatpickr-css' href='./mdtCivilianSelected/css/elementor-assets-lib-flatpickr-flatpickr.min.css' media='all'/>
        <link rel='stylesheet' id='elementor-post-14052-css' href='./mdtCivilianSelected/css/elementor-css-post-14052.css' media='all'/>
        <link rel='stylesheet' id='elementor-post-14063-css' href='./mdtCivilianSelected/css/elementor-css-post-14063.css' media='all'/>
        <link rel='stylesheet' id='elementor-post-14078-css' href='./mdtCivilianSelected/css/elementor-css-post-14078.css' media='all'/>
        <link rel='stylesheet' id='elementor-post-14069-css' href='./mdtCivilianSelected/css/elementor-css-post-14069.css' media='all'/>
        <link rel='stylesheet' id='elementor-post-14091-css' href='./mdtCivilianSelected/css/elementor-css-post-14091.css' media='all'/>
        <link rel='stylesheet' id='elementor-post-14084-css' href='./mdtCivilianSelected/css/elementor-css-post-14084.css' media='all'/>
        <link rel='stylesheet' id='elementskit-reset-button-for-pro-form-css-css' href='./mdtCivilianSelected/css/elementskit-modules-pro-form-reset-button-assets-css-elementskit-reset-button.css' media='all'/>
        <link rel='stylesheet' id='e-animations-css' href='./mdtCivilianSelected/css/elementor-assets-lib-animations-animations.min.css' media='all'/>
        <script src="./mdtCivilianSelected/js/woocommerce-assets-js-jquery-blockui-jquery.blockUI.min.js" id="jquery-blockui-js"></script>
        <script id="wc-add-to-cart-js-extra">
            var wc_add_to_cart_params = {
                "ajax_url": "\/wp-admin\/admin-ajax.php",
                "wc_ajax_url": "\/?wc-ajax=%%endpoint%%",
                "i18n_view_cart": "View cart",
                "cart_url": "https:\/\/wp.fivesync.co.uk\/cart\/",
                "is_cart": "",
                "cart_redirect_after_add": "no"
            };
        </script>
        <script src="./mdtCivilianSelected/js/woocommerce-assets-js-frontend-add-to-cart.min.js" id="wc-add-to-cart-js"></script>
        <script src="./mdtCivilianSelected/js/woocommerce-assets-js-js-cookie-js.cookie.min.js" id="js-cookie-js"></script>
        <script id="woocommerce-js-extra">
            var woocommerce_params = {
                "ajax_url": "\/wp-admin\/admin-ajax.php",
                "wc_ajax_url": "\/?wc-ajax=%%endpoint%%"
            };
        </script>
        <script src="./mdtCivilianSelected/js/woocommerce-assets-js-frontend-woocommerce.min.js" id="woocommerce-js"></script>
        <script src="./mdtCivilianSelected/js/hello-elementor-assets-js-hello-frontend.min.js" id="hello-theme-frontend-js"></script>
        <script src="./mdtCivilianSelected/js/elementskit-lite-libs-framework-assets-js-frontend-script.js" id="elementskit-framework-js-frontend-js"></script>
        <script id="elementskit-framework-js-frontend-js-after">
            var elementskit = {
                resturl: 'https://wp.fivesync.co.uk/wp-json/elementskit/v1/',
            }
        </script>
        <script src="./mdtCivilianSelected/js/elementskit-lite-widgets-init-assets-js-widget-scripts.js" id="ekit-widget-scripts-js"></script>
        <script src="./mdtCivilianSelected/js/elementskit-modules-parallax-assets-js-anime.js" id="animejs-js"></script>
        <script defer src="./mdtCivilianSelected/js/elementskit-modules-parallax-assets-js-parallax-frontend-scripts.js" id="elementskit-parallax-frontend-defer-js"></script>
        <script src="./mdtCivilianSelected/js/elementskit-modules-particles-assets-js-particles.min.js" id="particles-js"></script>
        <script src="./mdtCivilianSelected/js/elementor-assets-js-webpack.runtime.min.js" id="elementor-webpack-runtime-js"></script>
        <script src="./mdtCivilianSelected/js/elementor-assets-js-frontend-modules.min.js" id="elementor-frontend-modules-js"></script>
        <script src="./mdtCivilianSelected/js/elementor-assets-lib-waypoints-waypoints.min.js" id="elementor-waypoints-js"></script>
        <script src="./mdtCivilianSelected/js/jquery-ui-core.min.js" id="jquery-ui-core-js"></script>
        <script id="elementor-frontend-js-before">
            var elementorFrontendConfig = {
                "environmentMode": {
                    "edit": false,
                    "wpPreview": false,
                    "isScriptDebug": false
                },
                "i18n": {
                    "shareOnFacebook": "Share on Facebook",
                    "shareOnTwitter": "Share on Twitter",
                    "pinIt": "Pin it",
                    "download": "Download",
                    "downloadImage": "Download image",
                    "fullscreen": "Fullscreen",
                    "zoom": "Zoom",
                    "share": "Share",
                    "playVideo": "Play Video",
                    "previous": "Previous",
                    "next": "Next",
                    "close": "Close",
                    "a11yCarouselWrapperAriaLabel": "Carousel | Horizontal scrolling: Arrow Left & Right",
                    "a11yCarouselPrevSlideMessage": "Previous slide",
                    "a11yCarouselNextSlideMessage": "Next slide",
                    "a11yCarouselFirstSlideMessage": "This is the first slide",
                    "a11yCarouselLastSlideMessage": "This is the last slide",
                    "a11yCarouselPaginationBulletMessage": "Go to slide"
                },
                "is_rtl": false,
                "breakpoints": {
                    "xs": 0,
                    "sm": 480,
                    "md": 768,
                    "lg": 1025,
                    "xl": 1440,
                    "xxl": 1600
                },
                "responsive": {
                    "breakpoints": {
                        "mobile": {
                            "label": "Mobile Portrait",
                            "value": 767,
                            "default_value": 767,
                            "direction": "max",
                            "is_enabled": true
                        },
                        "mobile_extra": {
                            "label": "Mobile Landscape",
                            "value": 880,
                            "default_value": 880,
                            "direction": "max",
                            "is_enabled": false
                        },
                        "tablet": {
                            "label": "Tablet Portrait",
                            "value": 1024,
                            "default_value": 1024,
                            "direction": "max",
                            "is_enabled": true
                        },
                        "tablet_extra": {
                            "label": "Tablet Landscape",
                            "value": 1200,
                            "default_value": 1200,
                            "direction": "max",
                            "is_enabled": false
                        },
                        "laptop": {
                            "label": "Laptop",
                            "value": 1366,
                            "default_value": 1366,
                            "direction": "max",
                            "is_enabled": false
                        },
                        "widescreen": {
                            "label": "Widescreen",
                            "value": 2400,
                            "default_value": 2400,
                            "direction": "min",
                            "is_enabled": false
                        }
                    }
                },
                "version": "3.19.2",
                "is_static": false,
                "experimentalFeatures": {
                    "e_optimized_assets_loading": true,
                    "e_font_icon_svg": true,
                    "additional_custom_breakpoints": true,
                    "container": true,
                    "e_swiper_latest": true,
                    "container_grid": true,
                    "theme_builder_v2": true,
                    "hello-theme-header-footer": true,
                    "editor_v2": true,
                    "block_editor_assets_optimize": true,
                    "ai-layout": true,
                    "landing-pages": true,
                    "e_image_loading_optimization": true,
                    "e_global_styleguide": true,
                    "page-transitions": true,
                    "notes": true,
                    "loop": true,
                    "form-submissions": true,
                    "e_scroll_snap": true
                },
                "urls": {
                    "assets": "https:\/\/wp.fivesync.co.uk\/wp-content\/plugins\/elementor\/assets\/"
                },
                "swiperClass": "swiper",
                "settings": {
                    "page": [],
                    "editorPreferences": []
                },
                "kit": {
                    "body_background_background": "classic",
                    "active_breakpoints": ["viewport_mobile", "viewport_tablet"],
                    "global_image_lightbox": "yes",
                    "lightbox_enable_counter": "yes",
                    "lightbox_enable_fullscreen": "yes",
                    "lightbox_enable_zoom": "yes",
                    "lightbox_enable_share": "yes",
                    "lightbox_title_src": "title",
                    "lightbox_description_src": "description",
                    "woocommerce_notices_elements": [],
                    "hello_header_logo_type": "logo",
                    "hello_header_menu_layout": "horizontal",
                    "hello_footer_logo_type": "logo"
                },
                "post": {
                    "id": 13542,
                    "title": "c-mdt-civilianSelected%20%E2%80%93%20Cali-Coast",
                    "excerpt": "",
                    "featuredImage": false
                }
            };
        </script>
        <script src="./mdtCivilianSelected/js/elementor-assets-js-frontend.min.js" id="elementor-frontend-js"></script>
        <script src="./mdtCivilianSelected/js/elementskit-modules-particles-assets-js-ekit-particles.js" id="ekit-particles-js"></script>
        <script src="./mdtCivilianSelected/js/elementskit-lite-widgets-init-assets-js-datatables.min.js" id="datatables-js"></script>
        <script src="./mdtCivilianSelected/js/elementor-assets-lib-flatpickr-flatpickr.min.js" id="flatpickr-js"></script>
        <script src="./mdtCivilianSelected/js/elementor-pro-assets-js-webpack-pro.runtime.min.js" id="elementor-pro-webpack-runtime-js"></script>
        <script src="./mdtCivilianSelected/js/dist-i18n.min.js" id="wp-i18n-js"></script>
        <script id="wp-i18n-js-after">
            wp.i18n.setLocaleData({
                'text direction\u0004ltr': ['ltr']
            });
        </script>
        <script id="elementor-pro-frontend-js-before">
            var ElementorProFrontendConfig = {
                "ajaxurl": "https:\/\/wp.fivesync.co.uk\/wp-admin\/admin-ajax.php",
                "nonce": "93f6a825bc",
                "urls": {
                    "assets": "https:\/\/wp.fivesync.co.uk\/wp-content\/plugins\/elementor-pro\/assets\/",
                    "rest": "https:\/\/wp.fivesync.co.uk\/wp-json\/"
                },
                "shareButtonsNetworks": {
                    "facebook": {
                        "title": "Facebook",
                        "has_counter": true
                    },
                    "twitter": {
                        "title": "Twitter"
                    },
                    "linkedin": {
                        "title": "LinkedIn",
                        "has_counter": true
                    },
                    "pinterest": {
                        "title": "Pinterest",
                        "has_counter": true
                    },
                    "reddit": {
                        "title": "Reddit",
                        "has_counter": true
                    },
                    "vk": {
                        "title": "VK",
                        "has_counter": true
                    },
                    "odnoklassniki": {
                        "title": "OK",
                        "has_counter": true
                    },
                    "tumblr": {
                        "title": "Tumblr"
                    },
                    "digg": {
                        "title": "Digg"
                    },
                    "skype": {
                        "title": "Skype"
                    },
                    "stumbleupon": {
                        "title": "StumbleUpon",
                        "has_counter": true
                    },
                    "mix": {
                        "title": "Mix"
                    },
                    "telegram": {
                        "title": "Telegram"
                    },
                    "pocket": {
                        "title": "Pocket",
                        "has_counter": true
                    },
                    "xing": {
                        "title": "XING",
                        "has_counter": true
                    },
                    "whatsapp": {
                        "title": "WhatsApp"
                    },
                    "email": {
                        "title": "Email"
                    },
                    "print": {
                        "title": "Print"
                    }
                },
                "woocommerce": {
                    "menu_cart": {
                        "cart_page_url": "https:\/\/wp.fivesync.co.uk\/cart\/",
                        "checkout_page_url": "https:\/\/wp.fivesync.co.uk\/checkout\/",
                        "fragments_nonce": "b0e21de940"
                    }
                },
                "facebook_sdk": {
                    "lang": "en_US",
                    "app_id": ""
                },
                "lottie": {
                    "defaultAnimationUrl": "https:\/\/wp.fivesync.co.uk\/wp-content\/plugins\/elementor-pro\/modules\/lottie\/assets\/animations\/default.json"
                }
            };
        </script>
        <script src="./mdtCivilianSelected/js/elementor-pro-assets-js-frontend.min.js" id="elementor-pro-frontend-js"></script>
        <script src="./mdtCivilianSelected/js/elementor-pro-assets-js-elements-handlers.min.js" id="pro-elements-handlers-js"></script>
        <script src="./mdtCivilianSelected/js/elementskit-lite-widgets-init-assets-js-animate-circle.min.js" id="animate-circle-js"></script>
        <script id="elementskit-elementor-js-extra">
            var ekit_config = {
                "ajaxurl": "https:\/\/wp.fivesync.co.uk\/wp-admin\/admin-ajax.php",
                "nonce": "eafe29215b"
            };
        </script>
        <script src="./mdtCivilianSelected/js/elementskit-lite-widgets-init-assets-js-elementor.js" id="elementskit-elementor-js"></script>
        <script src="./mdtCivilianSelected/js/elementskit-widgets-init-assets-js-elementor.js" id="elementskit-elementor-pro-js"></script>
        <script defer src="./mdtCivilianSelected/js/elementskit-modules-sticky-content-assets-js-elementskit-sticky-content.js" id="elementskit-sticky-content-script-init-defer-js"></script>
        <script src="./mdtCivilianSelected/js/elementskit-modules-pro-form-reset-button-assets-js-elementskit-reset-button.js" id="elementskit-reset-button-js"></script>
        <script defer src="./mdtCivilianSelected/js/elementskit-modules-parallax-assets-js-parallax-admin-scripts.js" id="elementskit-parallax-admin-defer-js"></script>
    </body>
</html>
