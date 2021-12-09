const container = document.querySelector(".main_container");
const datas = [];
const date = new Date();
const myData = {
  title: "제목은 뭐로할까",
  content: "테스트 내용입니당",
  nickname: "미해",
  date: "2021.12.09",
};

datas.push(myData);

const myData2 = {
  title: "제목은 뭐로할까",
  content: "테스트2 내용입니당",
  nickname: "미해인가",
  date: "2021.12.09",
};

datas.push(myData2);

const myData3 = {
  title: "오늘 저녁 뭐먹지",
  content: "아마 목살쌈장볶음밥을 먹을 것 같다!",
  nickname: "미해의 위장",
  date: "2021.12.09",
};

datas.push(myData3);

function addPost(postData) {
  const html = ` 
  <div class="main_card">
    <div class="image"></div>
    <h4 class="title">${postData.title}</h4>
    <p class="content">
      ${postData.content}
    </p>
    <p class="sub_content">
        <span class="nickname">By ${postData.nickname}</span>
        <span class="date">${postData.date}</span>
    </p>
  </div>
  `;
  container.innerHTML += html;
}

function showArticles() {
  datas.forEach((data) => {
    addPost(data);
  });
}

//showArticles();
{
  /* <div class="main_card">
<div class="image main_img_2"></div>
<h4 class="title">실수하지 않는 법</h4>
<p class="content">
  사실 잘 모르겠다. 그래도 하면서 점점 실력이 늘면 어이없는 실수는
  그래도 줄어들 .. 수 있지 않을까 하는 희망을 가져본다..!
</p>
</div> */
}
