document.addEventListener('DOMContentLoaded', function () {
  displayAllCars();
});

function displayAllCars() {
  fetch('cars.json')
    .then((response) => response.json())
    .then((carsJson) => {
      const allCars = [].concat(...Object.values(carsJson));

      allCars.forEach(car => {
        getCarInfo(car.model, car.year);
      });
    })
    .catch((error) => console.error('Error loading cars.json:', error));
}

function getRandomElements(array, count) {
  const shuffledArray = array.sort(() => Math.random() - 0.5);
  return shuffledArray.slice(0, count);
}

function getCarInfo(model, year) {
  const apiKey = 'LxexKNIRrc5b8WVvdVhPLA==sze0ULPWRlH3moId';
  const apiUrl = `https://api.api-ninjas.com/v1/cars?limit=1&model=${model}&year=${year}`;

  fetch(apiUrl, {
    headers: {
      'X-Api-Key': apiKey,
    },
  })
    .then((response) => response.json())
    .then((data) => {
      const carCard = createCarCard(data);
      document.getElementById('carContainer').appendChild(carCard);
    })
    .catch((error) => console.error('Error:', error));
}

function createCarCard(carData) {
  const carCard = document.createElement('div');
  carCard.classList.add('carCard');

  if (carData && carData.length > 0) {
    const car = carData[0];

    const carNameElement = document.createElement('h2');
    carNameElement.textContent = titleCase(`${car.year} ${car.make} ${car.model}`);
    carNameElement.classList.add('carName');
    carNameElement.style.fontSize = '18px';
    carNameElement.style.fontFamily = "'Manrope', sans-serif";
    carNameElement.style.fontWeight = "300";
    carNameElement.style.padding = "5px";
    carNameElement.style.backgroundColor = '#111b4c78';
    carCard.appendChild(carNameElement);

    var myHeaders = new Headers();
    myHeaders.append('X-API-KEY', '902b30d1e64ee9b254de788a2bef754a2883b47b');
    myHeaders.append('Content-Type', 'application/json');

    var raw = JSON.stringify({
      q: `${car.year} ${car.make} ${car.model}`,
      gl: 'ph',
    });

    var requestOptions = {
      method: 'POST',
      headers: myHeaders,
      body: raw,
      redirect: 'follow',
    };

    fetch('https://google.serper.dev/images', requestOptions)
      .then((response) => response.json())
      .then((result) => {
        if (result.images && result.images.length > 0) {
          const imageUrl = result.images[0].imageUrl;

          carCard.style.backgroundImage = `url(${imageUrl})`;
          carCard.style.backgroundSize = 'cover';
          carCard.style.backgroundPosition = 'center';
          carCard.style.backgroundRepeat = 'no-repeat';
        } else {
          console.log('No images found in the result.');
          carCard.style.backgroundColor = '#f0f0f0';
        }
      })
      .catch((error) => {
        console.log('Error fetching car images:', error);
        carCard.style.backgroundColor = '#f0f0f0';
      });

    const carButton = document.createElement('button');
    carButton.textContent = 'View Details';
    carButton.classList.add('button');
    carButton.addEventListener('click', () => expandCard(car));
    carButton.style.fontSize = '15px';
    carButton.style.backgroundColor = '#111b4c78';
    carNameElement.style.borderRadius = '4px';
    carCard.appendChild(carButton);
  } else {
    carCard.innerHTML = '<p>No car information available.</p>';
  }

  return carCard;
}

function expandCard(car) {
  sessionStorage.setItem('selectedCar', JSON.stringify(car));

  window.location.href = '/webapp/car-rental/rent.html';
}

function titleCase(str) {
  return str
    .toLowerCase()
    .split(' ')
    .map(function (word) {
      return word.charAt(0).toUpperCase() + word.slice(1);
    })
    .join(' ');
}