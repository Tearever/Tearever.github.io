window.nzxt = {
  v1: {
    onMonitoringDataUpdate: (data) => {
      const { cpus, gpus, ram, kraken } = data;
      
      document.getElementById("cpu-name").innerText = data.cpus[0].name.slice(7).trim();
      document.getElementById("cpu-temp").innerText = `${data.cpus[0].temperature.toFixed(0)}\u00B0C`;
      document.getElementById("cpu-load").innerText = `${data.gpus[0].temperature.toFixed(0)}\u00B0C`;
      console.log(data.cpus[0])
    }
  }
};