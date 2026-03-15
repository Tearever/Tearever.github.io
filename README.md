Kraken CPU Temperature Dashboard

This project is a simple web-based dashboard designed to display system monitoring data on an NZXT Kraken LCD using the NZXT CAM Web Integration API. The dashboard displays the CPU name and CPU temperature and is designed to be lightweight and easy to customize.

The layout consists of a main container with three regions: a top section for displaying the CPU name, a bottom-left section intended for metrics or text, and a bottom-right section intended for metrics or text.

The data is provided by NZXT CAM through the window.nzxt.v1.onMonitoringDataUpdate callback, which continuously sends hardware monitoring data to the webpage.

Project Structure
index.html
index.js
style.css

index.html
The main webpage layout. It contains the dashboard container and placeholders where hardware data is displayed.

index.js
Handles the NZXT CAM Web Integration callback and updates the page with real-time monitoring data.

style.css
Controls the layout and styling of the dashboard elements.

Requirements

Python (for running a local web server)

NZXT CAM installed

Web Integration enabled in NZXT CAM settings

Running the Dashboard Locally

Navigate to the project directory in a terminal.

Start a simple local web server using Python:

python -m http.server 8000

Open a browser and navigate to:

http://localhost:8000

Enable Web Integration in NZXT CAM and set the integration URL to:

http://localhost:8000

Once connected, NZXT CAM will load the webpage and begin sending monitoring data to the dashboard.

How It Works

NZXT CAM injects monitoring data into the webpage through a global object called window.nzxt. The dashboard listens for updates using:

window.nzxt = {
  v1: {
    onMonitoringDataUpdate: (data) => {
      // update dashboard elements
    }
  }
};

The data object includes hardware information such as:

CPUs

GPUs

RAM

Kraken device data

Example fields used in this project:

data.cpus[0].name
data.cpus[0].temperature

These values are inserted into the HTML elements using JavaScript.

Customization

You can easily modify the dashboard to display additional metrics such as:

GPU temperature

GPU usage

RAM usage

Kraken pump speed

Fan speeds

Simply update index.js and add additional elements to index.html.

Example:

document.getElementById("gpu").innerText =
  data.gpus[0].temperature.toFixed(1) + "°";
Notes

The available fields in the data object may vary depending on your hardware configuration. Logging the full object to the browser console can help discover available metrics.

console.log(data);
License

This project is provided as-is for personal use and experimentation with the NZXT CAM Web Integration API.
