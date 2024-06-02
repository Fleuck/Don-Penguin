const movies = [
    {image: "https://m.media-amazon.com/images/M/MV5BZGY3YjBlOWEtNDA3OC00ZTYwLThmNTktNDI1ODE2OTU2NjlkXkEyXkFqcGdeQXVyMjExNjgyMTc@._V1_.jpg" },
    {image: "https://m.media-amazon.com/images/M/MV5BZGY3YjBlOWEtNDA3OC00ZTYwLThmNTktNDI1ODE2OTU2NjlkXkEyXkFqcGdeQXVyMjExNjgyMTc@._V1_.jpg" },
    {image: "https://m.media-amazon.com/images/M/MV5BZGY3YjBlOWEtNDA3OC00ZTYwLThmNTktNDI1ODE2OTU2NjlkXkEyXkFqcGdeQXVyMjExNjgyMTc@._V1_.jpg" },
    {image: "https://m.media-amazon.com/images/M/MV5BZGY3YjBlOWEtNDA3OC00ZTYwLThmNTktNDI1ODE2OTU2NjlkXkEyXkFqcGdeQXVyMjExNjgyMTc@._V1_.jpg" },
    {image: "https://m.media-amazon.com/images/M/MV5BZGY3YjBlOWEtNDA3OC00ZTYwLThmNTktNDI1ODE2OTU2NjlkXkEyXkFqcGdeQXVyMjExNjgyMTc@._V1_.jpg" },
    {image: "https://m.media-amazon.com/images/M/MV5BZGY3YjBlOWEtNDA3OC00ZTYwLThmNTktNDI1ODE2OTU2NjlkXkEyXkFqcGdeQXVyMjExNjgyMTc@._V1_.jpg" },
    {image: "https://m.media-amazon.com/images/M/MV5BZGY3YjBlOWEtNDA3OC00ZTYwLThmNTktNDI1ODE2OTU2NjlkXkEyXkFqcGdeQXVyMjExNjgyMTc@._V1_.jpg" },
    {image: "https://m.media-amazon.com/images/M/MV5BZGY3YjBlOWEtNDA3OC00ZTYwLThmNTktNDI1ODE2OTU2NjlkXkEyXkFqcGdeQXVyMjExNjgyMTc@._V1_.jpg" },
    {image: "https://m.media-amazon.com/images/M/MV5BZGY3YjBlOWEtNDA3OC00ZTYwLThmNTktNDI1ODE2OTU2NjlkXkEyXkFqcGdeQXVyMjExNjgyMTc@._V1_.jpg" },
    {image: "https://m.media-amazon.com/images/M/MV5BZGY3YjBlOWEtNDA3OC00ZTYwLThmNTktNDI1ODE2OTU2NjlkXkEyXkFqcGdeQXVyMjExNjgyMTc@._V1_.jpg" },
    {image: "https://m.media-amazon.com/images/M/MV5BZGY3YjBlOWEtNDA3OC00ZTYwLThmNTktNDI1ODE2OTU2NjlkXkEyXkFqcGdeQXVyMjExNjgyMTc@._V1_.jpg" },
    {image: "https://m.media-amazon.com/images/M/MV5BZGY3YjBlOWEtNDA3OC00ZTYwLThmNTktNDI1ODE2OTU2NjlkXkEyXkFqcGdeQXVyMjExNjgyMTc@._V1_.jpg" },
    {image: "https://m.media-amazon.com/images/M/MV5BZGY3YjBlOWEtNDA3OC00ZTYwLThmNTktNDI1ODE2OTU2NjlkXkEyXkFqcGdeQXVyMjExNjgyMTc@._V1_.jpg" },
    {image: "https://m.media-amazon.com/images/M/MV5BZGY3YjBlOWEtNDA3OC00ZTYwLThmNTktNDI1ODE2OTU2NjlkXkEyXkFqcGdeQXVyMjExNjgyMTc@._V1_.jpg" },
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
