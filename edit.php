<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
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
    <link rel="stylesheet" href="./css/index.css" />
    <link rel="stylesheet" href="./css/edit.css" />
  </head>
  <body>
    <header>
      <h1 id="logo_title">
        <a href="./index.php"> Me<span class="hl">Hey</span></a>
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
      <main class="article">
        <div class="main_header">
          <h3>홈</h3>
          <h3>부스러기</h3>
        </div>
        <form action="edit2.php" method="post" autocomplete="off">
          <div class="input_container">
            <select id="category" name="category">
              <option value="none">카테고리 선택</option>
              <option value="all">전체</option>
            </select>
            <?php
                 $id=$_GET['id'];
                $conn = mysqli_connect('127.0.0.1','root',"");
                if(!$conn){
                  echo "link failure";
                  exit;
                }
                mysqli_query($conn,"use blog");
                mysqli_set_charset($conn,"utf8");
                $result = mysqli_query($conn,"select * from postdata where id='$id'");
                if(mysqli_num_rows($result)==0){
                  echo "존재하지 않는 데이터입니다.";
                  exit;
                }
                $data = mysqli_fetch_row($result);
                echo "
                <input
                 type='text'
                  placeholder='제목'
                  id='title'
                  name='title' 
                  value='$data[1]'
                  />
                <input
                  type='text'
                  placeholder='작성자명'
                  id='nickname'
                  name='nickname'
                  value='$data[2]'
                />
                <input
                  type='text'
                  placeholder='비밀번호 설정'
                  id='password'
                  name='password'
                  value='$data[3]'
                />
              </div>
              <input type='hidden' name='date' id='date' />
              <textarea
                placeholder='내용 입력'
                id='content'
                name='content'
                
              >$data[4]</textarea>";

              echo "<input type='text' name='id' id='id' value='$id' class='hide'>";
              mysqli_close($conn);
            ?>
          <input type="submit" id="submit" value="게시물 올리기" />
        </form>
      </main>
    </div>
    <!-- <script src="edit.js"></script> -->
  </body>
</html>
