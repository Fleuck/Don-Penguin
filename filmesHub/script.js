const movies = [
    {image: "../midia/images.jpeg" },
    {image: "../midia/images.jpeg" },
    {image: "../midia/images.jpeg" },
    {image: "../midia/images.jpeg" },
    
];

const movieContainer = document.getElementById("movie-container");

movies.forEach(movie => {
    const movieElement = document.createElement("div");
    movieElement.classList.add("movie");
    movieElement.innerHTML = `
        <img src="${movie.image}" alt="${movie.title}">
    `;
    movieContainer.appendChild(movieElement);
});
