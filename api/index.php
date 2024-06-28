<?php
//  require 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TSEC CS Department</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/de882b6a69.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body>
    <div class="blur invisible" id='blurbox'></div>
    <div class="pop-cont invisible" id='pop-cont'>
        <div class="pop-up">
            <div class='pop-box-signup' id='signupbox'>
                <h1>Sign Up</h1>
                <form action='index.php' method='post' id='signupForm'>
                    <div class='field input'>
                        <label for='signup-username'>Username</label>
                        <input class='input-w' type='text' name='username' id='signup-username' required maxlength=50>
                    </div>
                    <div class='field'>
                        <label for='signup-password'>Password</label>
                        <input class='input-w' type='password' name='password' id='signup-password' required minlength=8 maxlength=20>
                    </div>
                    <div class='field'>
                        <label for='team'>Your Team</label>
                        <select class='input-w' name='team' id='team' required>
                            <option value='TJ'>Team Java</option>
                            <option value='TCPP'>Team C++</option>
                            <option value='TP'>Team Python</option>
                            <option value='TAI'>Team AI ML</option>
                            <option value='TW'>Team Web Development</option>
                            <option value='TD'>Team Data Science</option>
                            <option value='TAnd'>Team Android Dev.</option>
                            <option value='TDSA'>Team DSA</option>
                        </select>
                    </div>
                    <div class='field'>
                        <label for='desc' id='desc-label'>Description</label>
                        <textarea id='desc' class='desc input-w' name='desc' required></textarea>
                    </div>
                    <div class='field'>
                        <label for='role'>Your Role</label>
                        <input class='input-w' type='text' id='role' name='role' required maxlength=50>
                    </div>
                    <div class="rem-me">
                        <label for='remember-me'>Remember me?</label>
                        <input type='checkbox' id='remember-me' name='remember_me'/>
                    </div>
                    <div class='submit'>
                        <button type='submit'>Sign Up</button>
                    </div>
                </form>
                <!-- <button onclick='loginBtn()'>login</button> -->
                <p>Already have an account? <a href='javascript:void(0);' onclick='loginBtn()'>Login</a></p>
            </div>
            <div class='pop-box-login' id='loginbox'>
                <h1>Login</h1>
                <form action='db.php' method='post' id='loginForm'>
                    <div class='field input'>
                        <label class='l-align' for='login-username'>Username</label>
                        <input class='r-align input-w' type='text' name='username' id='login-username' required maxlength=50>
                    </div>
                    <div class='field'>
                        <label class='l-align' for='login-password'>Password</label>
                        <input class='r-align input-w' type='password' name='password' id='login-password' required minlength=8 maxlength=20>
                    </div>
                    <div class="rem-me">
                        <label class='l-align' for='remember-me'>Remember me?</label>
                        <input type='checkbox' id='remember-me2' name='remember_me' value='remember_me'>
                    </div>
                    <div class='submit'>
                        <button type='submit'>Sign In</button>
                    </div>
                </form>
                <!-- <button onclick='signupBtn()'>Sign Up</button> -->
                <p>Don't have account? <a href='javascript:void(0);' onclick='signupBtn()'>Sign Up</a></p>
                <!-- <a href="login.php">log</a> -->
            </div>
            <div class='pop-box-update' id='updatebox'>
                <h1>Update Profile</h1>
                <form action='index.php' method='post' id='updateForm'>
                    <div class='field input'>
                        <label for='signup-username'>Username</label>
                        <input type='text' name='username' id='update-username' required maxlength=50>
                    </div>
                    <div class='field'>
                        <label for='signup-password'>Password</label>
                        <input type='password' name='password' id='update-password' required minlength=8 maxlength=20 placeholder='Please fill old or new password here'>
                    </div>
                    <div class='field'>
                        <label for='team'>Your Team</label>
                        <select name='team' id='update-team' required>
                            <option value='TJ'>Team Java</option>
                            <option value='TCPP'>Team C++</option>
                            <option value='TP'>Team Python</option>
                            <option value='TAI'>Team AI ML</option>
                            <option value='TW'>Team Web Development</option>
                            <option value='TD'>Team Data Science</option>
                            <option value='TAnd'>Team Android Dev.</option>
                            <option value='TDSA'>Team DSA</option>
                        </select>
                    </div>
                    <div class='field'>
                        <label for='desc' id='desc-label'>Description</label>
                        <textarea id='update-desc' class='desc' name='desc' required></textarea>
                    </div>
                    <div class='field'>
                        <label for='role'>Your Role</label>
                        <input type='text' id='update-role' name='role' required maxlength=50>
                    </div>
                    <div class='submit'>
                        <button type='submit'>Done</button>
                        <button id='edit-cancel'>Cancel</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <header>
        <nav>
            <div class="logo"><img src="https://ramantivirus.net/wp-content/uploads/2022/06/Untitled-design-2.png"
                    alt=""></div>
            <div class="nav-links">
                <a href="#homeid">Home</a>
                <a href="#aboutid">About</a>
                <a href="#teams-id">Teams</a>
                <a href="#notes-id">Notes</a>
                <a href="#users-id">Users</a>
                <a href="#fac-id">Faculty</a>
            </div>
            <a href="#users-id"><button id='usericon'></button></a>
            <button id='modeBtn'></button>
        </nav>
    </header>
    <main>
        <section class="home" id="homeid">
            <div class="wave"></div>
            <div class="home-heading">
                <div class="home-h1-cont">
                    <h1><i class="fa-solid fa-computer"></i> TSEC CS Depatment</h1>
                </div>
            </div>
            <div class="home-container">
                <div class="home-para">
                    <p><span>T</span>his the official unofficial website of the greatest department of the TSEC collage.
                    </p>
                    <p class="slogan">We are the best!</p>
                    <div class="short-contact">
                        <p class="getintouch">Get in touch by</p>
                        <div class="sc-buttons">
                            <div class="phone" onclick="phonenum()"><i class="fa-solid fa-phone"></i></div>
                            <div class="email" onclick="email()"><i class="fa-solid fa-envelope"></i></div>
                        </div>
                        <div class="sc-area">
                            <p id="scarea"></p>
                        </div>
                    </div>
                </div>
                <img src="images/homePic.webp"
                    alt="">
            </div>
            <div class="gallery">
                <img src="../public/images/tsec-row-1.jpg"
                    alt="">
                <img src="../public/images/tsec-row-2.jpg"
                    alt="">
                <img src="../public/images/tsec-row-3.jpg"
                    alt="">
                <img src="../public/images/tsec-row-4.jpg"
                    alt="">
                <img src="../public/images/tsec-row-5.jpg"
                    alt="">
            </div>
        </section>
        <section class="about" id="aboutid">
            <div class="about-heading">
                <div class="about-h1-cont">
                    <h1>About Us</h1>
                </div>
            </div>
            <div class="about-layout">
                <div class="about-fh">
                    <div class="about-para-cont">
                        <img src="http://uploads.edubilla.com/institution/logo/17/97/thakur-shivkumarsingh-memorial-engineering-college339.png"
                            alt="">
                        <p>
                            We are Thakur Shivkumarsingh Engineering College aka <strong>TSEC's</strong> most talented
                            and
                            hardworking department so far. Located at the Naval nagar, near Jhiri, Burhanpur (M.P.), our
                            department is headed and taken forward by one of the worlds most passionate and friendly
                            alumini
                            and faculty in the whole world!
                        </p>
                        <p class="ap2p">We teaches various subjects here such as</p>
                        <ul>
                            <li>OOPs</li>
                            <li>DSA</li>
                            <li>Java</li>
                            <li>Web Development</li>
                            <li>App Development</li>
                            <li>AI ML</li>
                        </ul>
                    </div>
                    <div class="about-contact">
                        <h1>Contact info</h1>
                        <div class="contact-pe">
                            <p><i class='bx bxs-phone'></i> 07325288068</p>
                            <p><i class='bx bxs-envelope'></i> tsec.mp@gmail.com</p>
                        </div>
                        <div class="social-icons">
                            <a
                                href="https://www.linkedin.com/school/thakur-shivkumar-singh-memorial-engineering-colleg/about/"><i
                                    class="fa-brands fa-linkedin"></i></a>
                            <a href="https://www.facebook.com/TSEC.Studenthub/"><i
                                    class="fa-brands fa-facebook"></i></a>
                            <a href="https://www.instagram.com/tsgi_burhanpur/"><i
                                    class="fa-brands fa-square-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="about-sh">
                    <div class="about-gallery">
                        <img src="https://media.licdn.com/dms/image/C4E1BAQHOTyoBQh0haw/company-background_10000/0/1598460707861/thakur_shivkumarsingh_memorial_management_college_navalnagar_ziri_cover?e=2147483647&v=beta&t=hn69hIYaUHYdisSiYoRZT7hk7M41gFAufVx2HNc1YZk"
                            alt="">
                        <span>Our Campus</span>
                    </div>
                    <div class="about-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1765.5802984999818!2d76.26270499732759!3d21.390911196208858!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd8321ad3ffffff%3A0xe29f11a5965abf76!2sThakur%20Shivkumarsingh%20Memorial%20Engineering%20College!5e1!3m2!1sen!2sin!4v1706209761827!5m2!1sen!2sin"
                            width="500" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <span>Our Location</span>
                    </div>
                </div>
            </div>
        </section>
        <div class="remaining-sections">
            <div class="left-cont">
                <section class="teams" id="teams-id">
                    <div class="teams-cont">
                        <div class="teams-heading">
                            <div class="teams-h1-cont">
                                <h1>Our Teams</h1>
                            </div>
                        </div>

                        <div class="teams-logo">
                            <div class="t-java">
                                <img src="images/Java-Dark.svg" alt="">
                                <p>Team Java</p>
                            </div>
                            <div class="t-cpp">
                                <img src="images/cpp.png" alt="">
                                <p>Team C++</p>
                            </div>
                            <div class="t-python">
                                <img src="images/Python-Dark.svg" alt="">
                                <p>Team Python</p>
                            </div>
                            <div class="t-ai-ml">
                                <img src="images/ai.png" alt="">
                                <p>Team AI ML</p>
                            </div>
                            <div class="t-web-dev">
                                <img src="images/web.png" alt="">
                                <p>Team Web dev</p>
                            </div>
                            <div class="t-ds">
                                <img src="images/data.png" alt="">
                                <p>Team Data Science</p>
                            </div>
                            <div class="t-android">
                                <img src="images/AndroidStudio-Dark.svg" alt="">
                                <p>Team Android dev</p>
                            </div>
                            <div class="t-dsa">
                                <img src="images/algorithm.png" alt="">
                                <p>Team DSA</p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="notes" id="notes-id">
                    <div class="notes-cont">
                        <div class="notes-heading">
                            <div class="notes-h1-cont">
                                <h1><i class="fa-solid fa-book"></i> Notes</h1>
                            </div>
                        </div>
                        <div class="notes-cards">
                            <div class="videos-card"><i class="fa-brands fa-youtube"></i>Study Videos</div>
                            <div class="qp-card"><i class="fa-solid fa-file-circle-question"></i>Question Papers</div>
                            <div class="notes-card"><i class="fa-solid fa-clipboard"></i>Notes</div>
                            <div class="pdf-card"><i class="fa-solid fa-book-open"></i>Text Books</div>
                        </div>

                    </div>
                </section>
                <section class="users" id="users-id">
                    <div class="user-cont">
                        <div class="user-heading">
                            <div class="user-h1-cont">
                                <h1><i class="fa-solid fa-user"></i> User Profile</h1>
                            </div>
                        </div>
                        <div class="user-info-cont">
                            <div class="user-info">
                                <h2>User information</h2>
                                <p class='labeling'>Username</p>
                                <p id='user-name' class='info-field'></p>
                                <p class='labeling'>Team</p>
                                <p id='user-team' class='info-field'></p>
                                <p class='labeling'>Role</p>
                                <p id='user-role' class='info-field'></p>
                                <p class='labeling'>Description</p>
                                <p id='user-desc' class='info-field'></p>
                                <div class="user-btns">
                                    <button id='edit-btn'>Edit Info</button>
                                    <button id='logout-btn'>Logout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="faculty" id="fac-id">
                    <div class="fac-cont">
                        <div class="fac-heading">
                            <div class="fac-h1-cont">
                                <h1><i class="fa-solid fa-person-chalkboard"></i> Our Faculty</h1>
                            </div>
                        </div>
                        <div class="fac-cards">
                            <div class="rkv-sir"><i class="fa-solid fa-user-tie"></i>Raj k. Verma Sir</div>
                            <div class="vy-sir"><i class="fa-solid fa-user-tie"></i>Vikas k. Yadav Sir</div>
                            <div class="sg-sir"><i class="fa-solid fa-user-tie"></i>Swapnil Gupta Sir</div>
                            <div class="am-mam"><i class="fa-solid fa-user-tie"></i>Ayushi Malwi Mam</div>
                            <div class="j-mam"><i class="fa-solid fa-user-tie"></i>Jinal Mam</div>
                            <div class="n-mam"><i class="fa-solid fa-user-tie"></i>Neha Mam</div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="aside">
                <div class="aside-cont">
                    <h1>Team Analytics</h1>
                    <!-- <table class="table">
                        <tr>
                            <th>Rank</th>
                            <th>Team</th>
                            <th>Votes</th>
                        </tr>
                        <tr>
                            <td>
                                <div>1</div>
                            </td>
                            <td>
                                <div id='Rank1name'>
                                    <?php
                              echo "".$sortedNames[0];
                              ?>
                                </div>
                            </td>
                            <td>
                                <div id='Rank1data'>
                                    <?php
                              echo "".$sortedValues[0];
                              ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>2</div>
                            </td>
                            <td>
                                <div id='Rank2name'>
                                    <?php
                              echo "".$sortedNames[1];
                              ?>
                                </div>
                            </td>
                            <td>
                                <div id='Rank2data'>
                                    <?php
                              echo "".$sortedValues[1];
                              ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>3</div>
                            </td>
                            <td>
                                <div id='Rank3name'>
                                    <?php
                              echo "".$sortedNames[2];
                              ?>
                                </div>
                            </td>
                            <td>
                                <div id='Rank3data'>
                                    <?php
                              echo "".$sortedValues[2];
                              ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>4</div>
                            </td>
                            <td>
                                <div id='Rank4name'>
                                    <?php
                              echo "".$sortedNames[3];
                              ?>
                                </div>
                            </td>
                            <td>
                                <div id='Rank4data'>
                                    <?php
                              echo "".$sortedValues[3];
                              ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>5</div>
                            </td>
                            <td>
                                <div id='Rank5name'>
                                    <?php
                              echo "".$sortedNames[4];
                              ?>
                                </div>
                            </td>
                            <td>
                                <div id='Rank5data'>
                                    <?php
                              echo "".$sortedValues[4];
                              ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>6</div>
                            </td>
                            <td>
                                <div id='Rank6name'>
                                    <?php
                              echo "".$sortedNames[5];
                              ?>
                                </div>
                            </td>
                            <td>
                                <div id='Rank6data'>
                                    <?php
                              echo "".$sortedValues[5];
                              ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>7</div>
                            </td>
                            <td>
                                <div id='Rank7name'>
                                    <?php
                              echo "".$sortedNames[6];
                              ?>
                                </div>
                            </td>
                            <td>
                                <div id='Rank7data'>
                                    <?php
                              echo "".$sortedValues[6];
                              ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>8</div>
                            </td>
                            <td>
                                <div id='Rank8name'>
                                    <?php
                              echo "".$sortedNames[7];
                              ?>
                                </div>
                            </td>
                            <td>
                                <div id='Rank8data'>
                                    <?php
                              echo "".$sortedValues[7];
                              ?>
                                </div>
                            </td>
                        </tr>
                    </table> -->
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="bottom-nav">
            <p class='footer-headings'>Site Map</p>
            <div class="bn-cont">
            <ul>
                <li><a href="#homeid">Home</a></li>
                <li><a href="#aboutid">About</a></li>
                <li><a href="#teams-id">Teams</a></li>
                <li><a href="#notes-id">Notes</a></li>
                <li><a href="#users-id">Users</a></li>
                <li><a href="#fac-id">Faculty</a></li>
            </ul>
            </div>
        </div>
        <div class="bottom-contact">
            <p class='footer-headings'>Contact Info.</p>
            <div class="bc-cont">
                            <div class="footer-phone"><p><i class="fa-solid fa-phone"></i> 7325288070</p></div>
                            <div class="footer-email"><p><i class="fa-solid fa-envelope"></i> tsec.mp@gmail.com</p></div>
            </div>
        </div>
        <div class="bottom-links">
            <p class='footer-headings'>Follow Us On</p>
            <div class="bl-cont">
            <div class="ln"><a href="https://www.linkedin.com/school/thakur-shivkumar-singh-memorial-engineering-colleg/about/"><i class="fa-brands fa-linkedin"></i></a></div>
            <div class="fb"><a href="https://www.facebook.com/TSEC.Studenthub/"><i class="fa-brands fa-facebook"></i></a></div>
            <div class="ig"><a href="https://www.instagram.com/tsgi_burhanpur/"><i class="fa-brands fa-square-instagram"></i></a></div>
            </div>
        </div>
        <div class="author"><p class='footer-headings'>Site Creator</p><div class="a-cont"><p class='a-name'>Shoaib Akhtar</p><p><i class="fa-solid fa-square-check"></i> Full Stack Developer</p><p><i class="fa-solid fa-square-check"></i> Android Developer</p><p><i class="fa-solid fa-square-check"></i> AI Prompt Engineer</p></div></div>
        <div class="tec-used">
            <p class='footer-headings'>Tech Used</p>
            <div class="tec-cont">
            <ul>
                <li>&nbsp;<i class="fa-brands fa-html5"  style='font-size : 1.1rem;'></i>&nbsp;&nbsp;&nbsp;HTML</li>
                <li>&nbsp;<i class="fa-brands fa-css3-alt" style='font-size : 1.1rem;'></i> &nbsp;&nbsp;CSS</li>
                <li>&nbsp;<i class="fa-brands fa-js" style='font-size : 1rem;'></i>&nbsp; JavaScript</li>
                <li><i class="fa-brands fa-php" style='font-size : 1rem;'></i>&nbsp; PHP</li>
                <li>&nbsp;<i class="fa-solid fa-database" style='font-size : 0.85rem;'></i> &nbsp;&nbsp;MySQL</li>
            </ul>
            </div>
        </div>
    </footer>
    <div class="sec-foot-cont">
    <div class="sec-footer"><p>&copy; Shoaib Akhtar</p></div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
</body>

</html>