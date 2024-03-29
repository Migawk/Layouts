<header class="header">

    <?php include 'components/logo.php' ?>
    <nav>
        <ul>
            <li><a href="#" class="locator">Home</a></li>
            <li><a href="#" class="locator">Blog</a></li>
            <li><a href="#" class="locator">Single Post</a></li>
            <li><a href="#" class="locator">Pages</a></li>
            <li><a href="#" class="locator">Contact</a></li>
        </ul>
    </nav>
    <div class="actions">
        <div class="search">
            <input type="text" placeholder="Search">
            <button><img src="../assets/ico/search.svg" /></button>
        </div>
        <div class="themeToggle">
            <input type="checkbox" name="theme" id="theme" hidden>
            <label for="theme">
                <div tabindex="0" class="themeField" id="themeToggle">
                    <div class="themeFieldToggle">
                        <img src="../assets/ico/sun.svg" />
                    </div>
                </div>
            </label>
        </div>
    </div>
</header>
<script async>
    const toggler = document.getElementById("themeToggle");
    const theme = document.getElementById("theme");

    const styleSheet = `
                body {
                    background: #181A2A;
                    color: #fff;
                }
                header {
                    background: #181A2A;
                }
                .locator {
                    color: #fff;
                }
                .search {
                    background: #242535;
                }
                .search > input {
                    color: #A1A1AA;
                }
                .themeField {
                    background: #4B6BFB;
                }
                .logo {
                    color: #fff;
                }
                .article {
                    border: 1px solid #242535;
                }
                .articleName > a {
                    color: #fff;
                }
                .topic {
                    background: rgba(75, 107, 251, .05)
                }
                footer {
                    background: #141624;
                }
                .footerLetter {
                    background: #242535;
                }
                .secondary {
                    color: #FFFFFF;
                }
                .smallColumnList > a {
                    color: #BABABF;
                }
                .footerLetterContent > :nth-child(1) {
                    color: #FFFFFF;
                }
                .footerLetterContent > :nth-child(2) {
                    color: #97989F;
                }
                .footerLetterEmail {
                    background: #181A2A;
                    border-color: #3B3C4A;
                }
                .footerLetterEmail > input {
                    color: #97989F;
                }
                .footerActions > a {
                    color: #BABABF;
                }
                .svg > path {
                    fill: #fff;
                }
                .userPanel {
                    background: #242535;
                }
                .userName {
                    color: #fff;
                }
                .userStatus {
                    color: #BABABF;
                }
                .userDescription {
                    color: #BABABF;
                }
                .window {
                    background: #181A2A;
                    border-color: #242535;
                }
                .windowTopic {
                    background: #4B6BFB;
                }
                .postContent {
                    color: #BABABF;
                }`;

    function handleTheme() {
        console.log(theme.checked);
        toggler.children[0].animate({
            transform: theme.checked ? "translateX(0)" : "translateX(18px)"
        }, {
            duration: 500,
            fill: "forwards"
        });
        if (theme.checked) {
            localStorage.setItem("theme", "white");
            document.getElementById("themeStyle")?.remove();
        } else {
            localStorage.setItem("theme", "black");
            const style = document.createElement("style");
            style.id = "themeStyle";

            style.appendChild(document.createTextNode(styleSheet));
            document.getElementsByTagName("head")[0].appendChild(style);
        }
    }
    if (localStorage.getItem("theme") === "black") {
        theme.checked = true;
        const style = document.createElement("style");
        style.id = "themeStyle";
        toggler.children[0].animate({
            transform: "translateX(18px)"
        }, {
            duration: 500,
            fill: "forwards"
        });

        style.appendChild(document.createTextNode(styleSheet));
        document.getElementsByTagName("head")[0].appendChild(style);
    }
    if (toggler && theme) {
        toggler.addEventListener('click', () => handleTheme(true));
    }
</script>