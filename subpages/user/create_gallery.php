<?php
include('../../scripts-php/auth.php');
include('../../scripts-php/db.php');
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create gallery</title>
    <script src="https://kit.fontawesome.com/40b2e07baf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../styles/user_panel_main.css" />
    <link rel="stylesheet" href="../../styles/user_create_gallery.css" />
</head>

<body>
    <div class="content">
        <div class="panel">
            <span id="logo"><a href="./dashboard.php">FastCms</a> </span>
            <div class="nav">
                <div class="blur"></div>
                <a href="./dashboard.php"><i class="fa-solid fa-house"></i> Dashboard</a>
                <div class="checked">
                    <a href="./create_gallery.php"><i class="fa-solid fa-screwdriver-wrench"></i> Create gallery</a>
                </div>
                <a href="./view_galleries.php"><i class="fa-solid fa-file"></i> Your galleries</a>
                <div class="down">
                    <a href="./settings.php"><i class="fa-solid fa-gear"></i> Settings</a>
                    <a href="../../scripts-php/logout.php"><i class="fa-solid fa-door-open"></i> Logout</a>
                </div>
            </div>
        </div>
        <div class="main">
            <h1 class="heading">Create new gallery</h1>
            <div class="cont">
                <form action="../../scripts-php/creategallery.php" method="post" class="formr">
                    <div class="place">
                        <div class="form">
                            <label for="name">GALLERY NAME</label>
                            <input type="text" name="name" id="name" placeholder="ENTER NAME" required>
                            <label for="header">GALLERY HEADER</label>
                            <input type="text" name="header" id="h" placeholder="ENTER HEADER" required>
                            <label for="fc">GALLERY MAIN COLOUR (use HEX)</label>
                            <input type="text" name="fc" id="fc" placeholder="ENTER FIRST COLOUR" pattern="[a-fA-F\d]+"
                                required>
                            <label for="sc">GALLERY ADDON COLOUR (use HEX)</label>
                            <input type="text" name="sc" id="sc" placeholder="ENTER SECOND COLOUR" pattern="[a-fA-F\d]+"
                                required>
                            <label for="font">GALLERY FONT COLOUR (use HEX)</label>
                            <input type="text" name="font" id="font" placeholder="ENTER FONT COLOUR" required>
                        </div>
                        <div class="themes">
                            <div class="flex">
                                <div class="left_arrow">
                                    <i class="fa-solid fa-arrow-left-long"></i>
                                </div>
                                <span id="photoSpace"></span>
                                <div class="right_arrow">
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </div>
                            </div>
                            <div id="info" class="info">
                                <span>Name: <span id="names"></span> </span>
                                <span><a id="alert" style="user-select: none;">For description click here!</a></span>
                                <div class="desc"><i id="close" class="fa-solid fa-xmark align"></i><span
                                        id="desc"></span></div>
                            </div>

                        </div>
                    </div>
            </div>
            <div class="dragging_space">
                <div class="dragging_cont">
                    <div class="conteiner">
                        <div class="hidden_info_div" id="0">
                            <div class="conts">
                                <span class="contsheading">Paste here information about photo</span>
                                <i class="fa-solid fa-xmark close" id="1"></i>
                                <label for="link" id="hideit">Paste here a URL</label>
                                <input type="text" placeholder="ENTER URL" name="link" id="link">
                                <label for="caption" id="hideit2">Paste here photo caption (optional)</label>
                                <input type="text" placeholder="ENTER CAPTION (optional)" name="caption" id="caption">
                                <button id="sub_info" type="button">SUBMIT</button>
                            </div>
                        </div>
                        <div class="hidden_info_div" id="1">
                            <div class="conts">
                                <span class="contsheading">Paste here information about photo</span>
                                <i class="fa-solid fa-xmark close" id="1"></i>
                                <label for="link" id="hideit">Paste here a URL</label>
                                <input type="text" placeholder="ENTER URL" name="link" id="link">
                                <label for="caption" id="hideit2">Paste here photo caption (optional)</label>
                                <input type="text" placeholder="ENTER CAPTION (optional)" name="caption" id="caption">
                                <button id="sub_info" type="button">SUBMIT</button>
                            </div>
                        </div>
                        <div class="hidden_info_div" id="2">
                            <div class="conts">
                                <span class="contsheading">Paste here information about photo</span>
                                <i class="fa-solid fa-xmark close" id="1"></i>
                                <label for="link" id="hideit">Paste here a URL</label>
                                <input type="text" placeholder="ENTER URL" name="link" id="link">
                                <label for="caption" id="hideit2">Paste here photo caption (optional)</label>
                                <input type="text" placeholder="ENTER CAPTION (optional)" name="caption" id="caption">
                                <button id="sub_info" type="button">SUBMIT</button>
                            </div>
                        </div>
                        <span id="elements" class="elements" ondragover="onDragOver(event);">
                            <div id="el0" class="drag_here" ondrop="onDrop(event);"> </div>
                            <div id="el1" class="drag_here" ondrop="onDrop(event);"> </div>
                            <div id="el2" class="drag_here" ondrop="onDrop(event);"> </div>
                        </span>
                        <span class="plus-icon">
                            <i class="fa-solid fa-plus plus"></i>
                        </span>
                    </div>
                </div>
                <div class="dragging_elements">
                    <div id="small_photo" draggable="true" ondragstart="onDragStart(event);">
                        <span class="text">SMALL PHOTO</span>
                        <span class="icons"><i class="fa-solid fa-info"></i></span>
                    </div>
                    <div id="medium_photo" draggable="true" ondragstart="onDragStart(event);">
                        <span class="text">MEDIUM PHOTO</span>
                        <span class="icons"><i class="fa-solid fa-info"></i></span>
                    </div>
                    <div id="big_photo" draggable="true" ondragstart="onDragStart(event);">
                        <span class="text">BIG PHOTO</span>
                        <span class="icons"><i class="fa-solid fa-info"></i></span>
                    </div>
                    <div id="header" draggable="true" ondragstart="onDragStart(event);">
                        <span class="text">HEADER</span>
                        <span class="icons"><i class="fa-solid fa-font"></i></span>
                    </div>
                    <div id="acapit" draggable="true" ondragstart="onDragStart(event);">
                        <span class="text">PARAGRAPH</span>
                        <span class="icons"><i class="fa-solid fa-font"></i></span>
                    </div>
                </div>
            </div>
            <input type="submit" value="SUBMIT" id="submit">
            </form>
        </div>
        <script src="../../scripts-js/themesGallery.js"></script>
        <script src="../../scripts-js/drag_and_drop.js"></script>
</body>

</html>