//CREATE ARTICLE
function createArticle() {
// отримую дані з модального вікна
var category = document.getElementById('_category').value;
var image = document.getElementById('_image').files[0].name;
var title = document.getElementById('_titleArticle').value;
var body = document.getElementById('_bodyArticle').value;
//передаю їх в об'єкт'
var article = {
  category: category,
  image: image,
  title: title,
  body: body,
};

//об'єкт бібліотека статей
var libraryArticle = {
	name: "All articles",
	articles:[],
}

//функція яка записує нову статтю в кінець масиву в бібліотеку
function addArticleToStore(article) {
  if (article) {  	
    libraryArticle.articles.push(article);
  }
};

addArticleToStore(article);

/*
for (var i = 0; i < libraryArticle.articles.length; i++){
console.log(libraryArticle.articles[i]);

	//LOCAL STORAGE
		//var serialObj = JSON.stringify(libraryArticle.articles[i]); //сериализуем его
		localStorage.setItem("myKey", libraryArticle.articles[i]); //запишем его в хранилище по ключу "myKey"
		
		 var returnObj = localStorage.getItem("myKey") //спарсим его обратно объект
		//var returnObj = JSON.parse(localStorage.getItem("myKey")) //спарсим его обратно объект
		
	}
*/
//for (var i = 0; i < libraryArticle.articles.length; i++){
//localStorage.setItem("savedData", JSON.stringify(libraryArticle));
//var obj = JSON.parse(localStorage.getItem("savedData"));

//}
//console.log(obj.articles[0]);

	// CATEGORY
	//масив блоків DIV
	var categories = [
						document.getElementById('_allArticles'),
						document.getElementById('_technologies'),
						document.getElementById('_programming'),
						document.getElementById('_events'),
						document.getElementById('_announcement'),
	];
	
	//ЗРОБИТИ ЩОБ КАТЕГОРІЇ ДОБАВЛЯЛИСЬ ДИНАМІЧНО З SELECT
	var categoryName = ['Category', 'Technologies', 'Programming', 'Events', 'Announcement']; //підготовлений масив з назвами категорій 
	
	//формування дати для відображенні в статті
	var d=new Date();
	var day=d.getDate();
	var month=d.getMonth()+1;
	var year=d.getFullYear();	

	// блок коду який передаєм в HTML
	var blockArticle = '<div class="container art">'+
						'<div class="col-md-4">'+
  						'<img src="images/article/'+article.image+'" alt="" class="img-responsive my-img">'+
						'</div>'+
						'<div class="caption col-md-8">'+
			          	'<p>'+article.category+'<span>  '+day+'.'+month+'.'+year+'</span></p>'+
			          	'<h3><a href="#">'+article.title+'</a></h3>'+
			          	'<p  class="text">'+article.body+'</p>'+            
			          	'<a href="#" class="btn btn-success" onclick="showArticle(this)">Read more <i class="fas fa-arrow-right"></i></a>'+
			        	'</div>'+'</div>'+'<br>';

		//розприділяємо в якій категорії відображатиметься стаття
		for (var i = 0; i < categoryName.length; i++){
			if (category === categoryName[i] && category !== categoryName[0]) {
				categories[i].insertAdjacentHTML('afterbegin', blockArticle);
				categories[0].insertAdjacentHTML('afterbegin', blockArticle);
			} else if (category === categoryName[0]){
			categories[0].insertAdjacentHTML('afterbegin', blockArticle);
			break;
		}
		}   
 	
}




//SHOW ARTICLE
function showArticle (el) {
	if(el.previousElementSibling.clientHeight === 100) {
		el.previousElementSibling.style.height = "100%";
		el.innerHTML = "Show Less...";
	} else {
		el.previousElementSibling.style.height = "100px";
		el.innerHTML = "Read More..."
	}
}


// SEARCH
function myFunction() {
	var input, filter, allArticles, art, h3, i, myTabs, categories;
	input = document.getElementById('_myInput');
	filter = input.value.toUpperCase();
	allArticles = document.getElementById('_allArticles');
	art = allArticles.getElementsByClassName('art');
	categories = [
					document.getElementById('_allArticles'),
					document.getElementById('_technologies'),
					document.getElementById('_programming'),
					document.getElementById('_events'),
					document.getElementById('_announcement'),
				];
	myTabs = document.getElementById('_myTabs');
	for (var j = 0; j < myTabs.length; j++) {
		console.log(myTabs[1]);
	}

	for (var i = 0; i < art.length; i++) {
  h3 =art[i].getElementsByTagName("h3")[0]; // [0] - обозначает "начиная со значения 0"
  if(h3.innerHTML.toUpperCase().indexOf(filter) > -1) {
   art[i].style.display = "";
  }
  else{
   art[i].style.display = "none";
  }
 }
}