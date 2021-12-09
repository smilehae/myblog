<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./index.css" />
    <script
      src="https://kit.fontawesome.com/5316a0a50e.js"
      crossorigin="anonymous"
    ></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Gowun+Dodum&family=Noto+Sans+KR:wght@100;400;700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <header>
      <h1 id="logo_title"><a href="./index.php">
        Me<span class="hl">Hey</span></a>
      </h1>
      <div class="right_top_btn_container">
        <button class="search_btn"><i class="fas fa-search"></i></button>
        <button class="setting_btn"></button>
      </div>
    </header>
    <div class="wrapper">
      <nav>
        <div id="profile_container">
          <div id="profile">
            <div class="profile_img"></div>
            <h3>smilehae</h3>
          </div>
          <p class="profile_log">
            하고싶은 것은 다 하고보는 초보 개발자의 일상 블로그
          </p>
          <div class="profile_links">
            <span
              ><a href="https://github.com/smilehae"
                ><i class="fab fa-github-alt my_icon"></i></a
            ></span>
          </div>
        </div>
        <div class="menu">
          <div class="category">
            <h3>분류 전체보기</h3>
            <div class="sub_category">
              <h4>전체</h4>
            </div>
          </div>
        </div>
      </nav>
      <main>
        <div class="main_header">
          <h3>홈</h3>
          <h3>부스러기</h3>
        </div>
        <h2 class="main_title">전체 글</h2>
        <div class="main_container">
        
          <?php
            //연결
            $conn= mysqli_connect("127.0.0.1","root","");
            if(!$conn){
              echo "link failure";
              exit;
            }
            mysqli_query($conn,"use blog");
            mysqli_set_charset($conn,"utf8");
            $result = mysqli_query($conn,"select * from postdata");
            $num= mysqli_num_rows($result);
            while($data = mysqli_fetch_row($result)){
              echo " 
              <div class='main_card'>
                <a href='subpage.php?id={$data[5]}'>
                  <div class='image'></div>
                </a>
                
                <h4 class='title'>$data[1]</h4>
                <p class='content'>
                  $data[4]
                </p>
                <p class='sub_content'>
                    <span class='nickname'>By $data[2]</span>
                    <span class='date'>$data[6]</span>
                </p>
              </div>";
            }
            mysqli_close($conn);
            
          ?>
        </div>
      </main>
    </div>
    <a href="./write_new.html">
      <button class="write_btn"><i class="fas fa-pencil-alt"></i></button>
    </a>
    <script src="./index.js"></script>
  </body>
</html>
