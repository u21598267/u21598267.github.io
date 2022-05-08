
let movies = [
    {
        id: 1, //a unique identifier for this movie
        title: `Spiderman: No Way Home`, //the title of this movie
        director: 'Jon Watts', //the name of the director of this movie
        runtime: '3 Hours and 4 minutes', //the runtime of this movie
        release_year: 2021, //the year this movie was released
        description: 'Peter Parker seeks Doctor Strange\'s help to make people forget about Spiderman\'s identity. However, when the spell he casts gets corrupted, several unwanted guests enter their universe.', //a description of this movie
        poster_url: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTrdPsGJEBxBev7gKo_EMp0Pgk7Q7su_xTUxf3vo8dE9S_CiG2Z', //a URL or file path to an image of the poster for this movie
        cinema_number: 1, //the number of the cinema this movie will be showing in
        ticket_price: 78, //the price of a single ticket for this movie
        tickets_in_cart: 0 //the number of tickets that have been booked for this movie
    },
    {
        id: 2, //a unique identifier for this movie
        title: `Jurassic World Dominion`, //the title of this movie
        director: 'Colin Trevorrow', //the name of the director of this movie
        runtime: '2h 46m', //the runtime of this movie
        release_year: 2022, //the year this movie was released
        description: 'This fragile balance will reshape the future and determine once and for all whether human beings are to remain the apex predators on a planet they now share with history\'s most fearsome creatures.', //a description of this movie
        poster_url: 'https://wegotthiscovered.com/wp-content/uploads/2022/04/FQUDopwVsAEjmB2.jpg', //a URL or file path to an image of the poster for this movie
        cinema_number: 2, //the number of the cinema this movie will be showing in
        ticket_price: 110, //the price of a single ticket for this movie
        tickets_in_cart: 0, //the number of tickets that have been booked for this movie
    },
    {
        id: 3, //a unique identifier for this movie
        title: `Avatar: The Way of Water`, //the title of this movie
        director: 'James Cameron', //the name of the director of this movie
        runtime: '3 Hours and 4 minutes', //the runtime of this movie
        release_year: 2022, //the year this movie was released
        description: 'Jake Sully and Ney\'tiri have formed a family and are doing everything to stay together. However, they must leave their home and explore the regions of Pandora. When an ancient threat resurfaces, Jake must fight a difficult war against the humans.', //a description of this movie
        poster_url: 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTSpxAT5IxlBjs7lG4CT5Y46aNfYIN6HHc5LiVoCMEAQmimRA-T', //a URL or file path to an image of the poster for this movie
        cinema_number: 3, //the number of the cinema this movie will be showing in
        ticket_price: 110, //the price of a single ticket for this movie
        tickets_in_cart: 0 //the number of tickets that have been booked for this movie
    },
    {
        id: 4, //a unique identifier for this movie
        title: `The Batman`, //the title of this movie
        director: 'Matt Reeves', //the name of the director of this movie
        runtime: '2 Hours and 34 minutes', //the runtime of this movie
        release_year: 2022, //the year this movie was released
        description: 'Batman ventures into Gotham City\'s underworld when a sadistic killer leaves behind a trail of cryptic clues. As the evidence begins to lead closer to home and the scale of the perpetrator\'s plans become clear, he must forge new relationships, unmask the culprit and bring justice to the abuse of power and corruption that has long plagued the metropolis.', //a description of this movie
        poster_url: 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRBkxgl2A2PhE_6tklFLT0bxn5NLhvhsnpXGhmXBt_zotrlVHmo', //a URL or file path to an image of the poster for this movie
        cinema_number: 4, //the number of the cinema this movie will be showing in
        ticket_price: 110, //the price of a single ticket for this movie
        tickets_in_cart: 0 //the number of tickets that have been booked for this movie
    }
];
var MovieTicketCounter = 0;

function FillMovies() {

    document.getElementById("ticketCount").innerHTML = MovieTicketCounter; //Ticket coutner next to cart icon
    var movieindex = 0;
    var counter = 1;
    var elementCounter = 0;
    const container = document.getElementById('movieContainer')
    movies.forEach((result, idx) => {


        // Construct card content
        var content;
        if (counter > 3) {
            counter = 1;
        }
        if (counter == 1) {
            content =
                '<div class="col-lg-3 col-md-6" style="margin-right: 30px;margin-top: 30px">\n';
        }
        else if (counter == 2) {
            content =
                ' <div class="col-lg-3 col-md-6" style="margin-right: 30px;margin-top:30px">\n';
        }
        else if (counter == 3) {
            content =
                ' <div class="col-lg-3 col-md-6" style="margin-top:30px">\n';
        }
        var str = elementCounter.toString();
        var heading = "heading" + str;
        var image = "image" + str;
        var descrip = "description" + str;
        var price = "price" + str;
        var header = "cinema" + str;
        var button = "button" + str; //this is where the cards are dynamically created
        content +=

            '            <div class="card" style="width: 18rem;">\n' +
            ' <div className="card-header" id=' + header + ' style="text-align:center;background-color: lightgrey;font-weight: bold;height:50px">Cinema</div>' +
            '                <img class="card-img-top" src="#" alt="Card image cap" id=' + image + '>\n' +
            '                <div class="card-body">\n' +
            '                    <h5 class="card-title" id=' + heading + '> </h5>\n' +
            '                    <p class="card-text" id=' + descrip + '></p>\n' +
            '                    <p class="card-text" id=' + price + ' style="font-weight: bold;color: #007bff"></p>\n' +

            '                </div>\n' +
            '           <div className="card-footer" style="background-color: lightgray;width:100%;height:100px" id="2"> <button name="button" onclick="addMovie(' + button + ')" class="btn btn-primary" style="margin-top:20px;margin-left:20px;height:50px;text-align: center" id=' + button + ' >Book Ticket</button><button type="button" class="btn btn-info btn-lg btn-secondary" style="margin:20px" data-toggle="modal" data-target="#myModal" onclick="modal(' + movieindex +')">About</button><div>\n </div>\n' +
            '        </div>';


        // Append newyly created card element to the container
        document.getElementById("row").innerHTML += content;
        counter++;
        document.getElementById(header).innerHTML = "Cinema  " + movies[movieindex]['cinema_number'];
        document.getElementById(image).setAttribute("src", movies[movieindex]['poster_url']);
        document.getElementById(heading).innerHTML = movies[movieindex]['title'];
        document.getElementById(price).innerHTML = "Movie Ticket Price: R" + movies[movieindex]['ticket_price'];
        document.getElementById(descrip).innerHTML = movies[movieindex]['description'];

        movieindex++;
        elementCounter++;
    })
    // container.innerHTML += content;

   

}









var totalCost = 0;
function addMovie(str) {
    MovieTicketCounter++;
    document.getElementById("ticketCount").innerHTML = MovieTicketCounter;
    localStorage.setItem('numberInCart', JSON.stringify(MovieTicketCounter)); //adding number of movies to cart
    if (str.getAttribute("id") == 'button0') {

        movies[0]['tickets_in_cart']++;
        totalCost += movies[0]['ticket_price'];
        localStorage.setItem('moviesInCart', JSON.stringify(movies)); //Movies added to localstorage
       

    }
    if (str.getAttribute("id") == 'button1') {

        movies[1]['tickets_in_cart']++;
        totalCost += movies[1]['ticket_price'];
        localStorage.setItem('moviesInCart', JSON.stringify(movies));
       

    }
    if (str.getAttribute("id") == 'button2') {

        movies[2]['tickets_in_cart']++;
        totalCost += movies[2]['ticket_price'];
        localStorage.setItem('moviesInCart', JSON.stringify(movies));
       

    }
    if (str.getAttribute("id") == 'button3') {

        movies[3]['tickets_in_cart']++;
        totalCost += movies[3]['ticket_price'];
        localStorage.setItem('moviesInCart', JSON.stringify(movies));
      

    }
    localStorage.setItem('totalCost', JSON.stringify(totalCost)); //adding totalCost to localstorage
}




function modal(index)
{
     //fill modal information
     document.getElementById("modalTitle").innerHTML= movies[index]['title'];
     document.getElementById("pTitle").innerHTML= "<b>Title: </b>" + movies[index]['title'];
     document.getElementById("pDirector").innerHTML= "<b>Director/s: </b>" + movies[index]['director'];
     document.getElementById("pYear").innerHTML= "<b>Release Year: </b>" + movies[index]['release_year'];
     document.getElementById("pRuntime").innerHTML= "<b>Runtime: </b>" + movies[index]['runtime'];
}





























