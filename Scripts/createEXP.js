document.addEventListener("DOMContentLoaded", () => {
  const mapEl = document.getElementById("map");
  if (!mapEl || typeof L === "undefined") return;

  const map = L.map("map").setView([46.0569, 14.5058], 13);

  L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
      '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
  }).addTo(map);

  let marker = null;

  const latInput = document.querySelector('input[name="latitude"]');
  const lngInput = document.querySelector('input[name="longitude"]');

  map.on("click", (e) => {
    const { lat, lng } = e.latlng;

    if (marker) {
      marker.setLatLng(e.latlng);
    } else {
      marker = L.marker(e.latlng).addTo(map);
    }

    latInput.value = lat.toFixed(6);
    lngInput.value = lng.toFixed(6);
  });
});
