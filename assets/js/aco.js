async function initializeMap() {
    const response = await fetch('https://aco-final-project.herokuapp.com/check-aco', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        "current_location_id": 1,
        "current_location_name": "Politeknik Elektronika Negeri Surabaya",
        "current_location_lat": -7.27584,
        "current_location_lng": 112.79118,
        "next_destination_id": 14,
        "next_destination_name": "Pasar Turi",
        "next_destination_lat": -7.246,
        "next_destination_lng": 112.732,
        "add_destination_id": 2,
        "add_destination_name": "Ekowisata Mangrove",
        "add_destination_lat": -7.3086311362422505,
        "add_destination_lng": 112.82170935994978
      })
      
    });
  
    if (!response.ok) {
      // Handle error if API request fails
      console.error('Error:', response.status);
      return;
    }
  
    const data = await response.json();
  
    const map = new google.maps.Map(document.getElementById('map'), {
      zoom: 13,
      center: { lat: parseFloat(data.current_location_lat), lng: parseFloat(data.current_location_lng) }
    });
  
    const trafficLayer = new google.maps.TrafficLayer();
    trafficLayer.setMap(map);
  
    const directionsService = new google.maps.DirectionsService();
    const directionsRenderer = new google.maps.DirectionsRenderer({
      map: map,
      suppressMarkers: true
    });
  
    const waypoints = [
      {
        location: { lat: parseFloat(data.current_location_lat), lng: parseFloat(data.current_location_lng) }
      },
      {
        location: { lat: parseFloat(data.add_destination_lat), lng: parseFloat(data.add_destination_lng) }
      },
      {
        location: { lat: parseFloat(data.next_destination_lat), lng: parseFloat(data.next_destination_lng) }
      }
    ];
  
    const request = {
      origin: waypoints[0].location,
      destination: waypoints[waypoints.length - 1].location,
      waypoints: waypoints.slice(1, waypoints.length - 1),
      travelMode: google.maps.TravelMode.DRIVING
    };
  
    directionsService.route(request, function(response, status) {
      if (status === google.maps.DirectionsStatus.OK) {
        directionsRenderer.setDirections(response);
        const route = response.routes[0];
        const legs = route.legs;
        const markerLabels = [];
        for (let i = 0; i < legs.length; i++) {
          markerLabels.push(String.fromCharCode(65 + i));
        }
        markerLabels.push(String.fromCharCode(65 + legs.length));
        for (let i = 0; i < legs.length; i++) {
          const marker = new google.maps.Marker({
            position: legs[i].start_location,
            label: markerLabels[i],
            map: map
          });
        }
      }
    });
  }