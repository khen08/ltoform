document.addEventListener('DOMContentLoaded', function () {
  const selectedCar = JSON.parse(sessionStorage.getItem('selectedCar'));
  console.log(selectedCar);
  if (selectedCar) {
    fetchCarDetails(selectedCar.make, selectedCar.model);
  } else {
    console.error('No car selected.');
  }
});

function fetchCarDetails(make, model) {
  const apiKey = 'LxexKNIRrc5b8WVvdVhPLA==sze0ULPWRlH3moId';
  const apiUrl = `https://api.api-ninjas.com/v1/cars?make=${make}&model=${model}&limit=1`;

  fetch(apiUrl, {
    headers: {
      'X-Api-Key': apiKey,
    },
  })
    .then((response) => response.json())
    .then((data) => {
      if (data && data.length > 0) {
        const carDetails = data[0];

        displayCarDetails(carDetails);
      } else {
        console.error('No car details found for the specified make and model.');
      }
    })
    .catch((error) => console.error('Error fetching car details:', error));
}

function displayCarDetails(carDetails) {
  document.querySelector('.contact-hdr').textContent = titleCase(`${carDetails.make} ${carDetails.model}`);

  document.querySelector('.car-model hr').insertAdjacentHTML('afterend', `
    <p>Transmission: ${carDetails.transmission === 'a' ? 'Automatic' : 'Manual'}</p>
    <p>Cylinders: ${carDetails.cylinders || 'Not available'}</p>
    <p>Fuel Type: ${titleCase(carDetails.fuel_type) || 'Not available'}</p>
    <p>Drive: ${getDriveDescription(titleCase(carDetails.drive)) || 'Not available'}</p>
  `);

  const apiKey = '902b30d1e64ee9b254de788a2bef754a2883b47b';
  const searchQuery = `${carDetails.make} ${carDetails.model}`;
  const searchUrl = 'https://google.serper.dev/images';

  var myHeaders = new Headers();
  myHeaders.append('X-API-KEY', apiKey);
  myHeaders.append('Content-Type', 'application/json');

  var raw = JSON.stringify({
    q: searchQuery,
    gl: 'ph',
  });

  var requestOptions = {
    method: 'POST',
    headers: myHeaders,
    body: raw,
    redirect: 'follow',
  };

  fetch(searchUrl, requestOptions)
    .then((response) => response.json())
    .then((result) => {
      if (result.images && result.images.length > 0) {
        const imageUrl = result.images[0].imageUrl;

        document.querySelector('.contact-img').style.backgroundImage = `url(${imageUrl})`;
        document.querySelector('.contact-img').style.backgroundSize = 'cover';
        document.querySelector('.contact-img').style.backgroundPosition = 'center';
        document.querySelector('.contact-img').style.backgroundRepeat = 'no-repeat';
      } else {
        console.log('No images found in the result.');
        document.querySelector('.contact-img').style.backgroundColor = '#f0f0f0';
      }
    })
    .catch((error) => {
      console.log('Error fetching car images:', error);
      document.querySelector('.contact-img').style.backgroundColor = '#f0f0f0';
    });
}

function getDriveDescription(driveType) {
  switch (driveType) {
    case 'Fwd':
      return 'Front-wheel Drive';
    case 'Rwd':
      return 'Rear-wheel Drive';
    case 'Awd':
      return 'All-wheel Drive';
    case '4wd':
      return 'Four-wheel Drive';
    default:
      return 'Unknown';
  }
}

function titleCase(str) {
  return str
    ? str
        .toLowerCase()
        .split(' ')
        .map(function (word) {
          return word.charAt(0).toUpperCase() + word.slice(1);
        })
        .join(' ')
    : '';
}