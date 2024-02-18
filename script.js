document.addEventListener('DOMContentLoaded', function() {

  // Habilitar y deshabilitar campos
  const checkbox = document.getElementById('acompanante');
  // const aviso = document.getElementById('terminos');

  const buttonReservar = this.documentElementById('reservar');
  const inputNombreInstitucion = document.getElementById('nombre_institucion');
  // const inputCiudad = document.getElementById('ciudad');
  // const inputCantidadAcompanantes = document.getElementById('cantidad-acompanantes');
  const inputMasculino = document.getElementById('genero_acompanante_masculino');
  const inputFemenino = document.getElementById('genero_acompanante_femenino');
  const inputOtro = document.getElementById('genero_acompanante_otro');
  const inputRangoEdad = document.getElementById('rango_edad');

  /* document.addEventListener('DOMContentLoaded', function() {
    const fechaInput = document.getElementById('fecha');
  
    // Obtener la fecha actual
    const currentDate = new Date();
    
    // Calcular la fecha con 3 días adicionales
    const maxDate = new Date();
    maxDate.setDate(currentDate.getDate() + 3);
  
    // Formatear las fechas en el formato necesario para el atributo "value" del input
    const formattedCurrentDate = currentDate.toISOString().split('T')[0];
    const formattedMaxDate = maxDate.toISOString().split('T')[0];
  
    // Establecer los atributos min y max en el input
    fechaInput.setAttribute('min', formattedCurrentDate);
    fechaInput.setAttribute('max', formattedMaxDate);
  });
 */
  checkbox.addEventListener('change', function() {
    inputNombreInstitucion.disabled = !this.checked;

    // buttonReservar.disable = !this.checked;

    // inputCiudad.disabled = !this.checked;
    // inputCantidadAcompanantes.disabled = !this.checked;
    inputMasculino.disabled = !this.checked;
    inputFemenino.disabled = !this.checked;
    inputOtro.disabled = !this.checked;
    inputRangoEdad.disabled = !this.checked;
  });

  // Seleccionar la hora
  function selectHour(hour) {
    const hourBoxes = document.querySelectorAll('.hour-box');
    hourBoxes.forEach(box => {
      box.classList.remove('selected-hour');
    });

    const selectedHourBox = document.querySelector(`.hour-box[data-hour="${hour}"]`);
    if (selectedHourBox) {
      selectedHourBox.classList.add('selected-hour');
    }

    document.getElementById('hora').value = hour;
  }


  
  // Escuchar el evento click en los elementos con la clase 'hour-box'
  const hourBoxes = document.querySelectorAll('.hour-box');
  hourBoxes.forEach(box => {
    box.addEventListener('click', function() {
      const selectedHour = this.getAttribute('data-hour');
      selectHour(selectedHour);

      // Realizar solicitud AJAX para verificar disponibilidad de la hora
      const formData = new FormData();
      formData.append('date', '...');
      formData.append('hora', selectedHour);

      fetch('ruta_del_archivo.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.error) {
          document.getElementById('mensaje-contenido').textContent = data.error;
          document.getElementById('mensaje').style.display = 'block';
        } else {
          document.getElementById('mensaje').style.display = 'none';
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
    });
  });
  
  document.getElementById("cerrar-mensaje").addEventListener("click", function() {
    document.getElementById("mensaje").style.display = "none";
  });
});








/* // Suponiendo que tienes una variable 'response' que contiene la respuesta JSON
if (response.error) {
  document.getElementById("mensaje-contenido").textContent = response.error;
  document.getElementById("mensaje").style.display = "block";
}

document.getElementById("cerrar-mensaje").addEventListener("click", function() {
  document.getElementById("mensaje").style.display = "none";
});
 */
//Subir imagen
function subirImagen() {
  const inputImagen = document.getElementById('imagen');
  const formData = new FormData();
  formData.append('imagen', inputImagen.files[0]);

  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'ruta_al_script_php.php', true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      
      const response = JSON.parse(xhr.responseText);
      
    }
  };
  xhr.send(formData);
}


/* const daysTag = document.querySelector(".days"),
  currentDate = document.querySelector(".current-date"),
  prevNextIcon = document.querySelectorAll(".icons span");
  fechaSeleccionadaInput = document.getElementById("fecha_seleccionada"); 

let date;
date = new Date(); 


date.setDate(date.getDate() + 3);

let currYear = date.getFullYear();
let currMonth = date.getMonth();

const months = [
  "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
  "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
];

const renderCalendar = () => {
  let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(),
    lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(),
    liTag = "";

  for (let i = 1; i <= lastDateofMonth; i++) {
    let currentDateObj = new Date(currYear, currMonth, i);
    let isInactive = currentDateObj < date;

    let isToday = currentDateObj.toDateString() === date.toDateString();

    liTag += `<li class="${isInactive ? 'inactive' : isToday ? 'active' : ''}" onclick="${isInactive ? '' : `selectDay(${i})`}">${i}</li>`;

    }

  currentDate.innerText = `${months[currMonth]} ${currYear}`;
  daysTag.innerHTML = liTag;

}; */

// function selectDay() {
//   fechaSeleccionadaInput.value = `${months[currMonth]} ${currYear}-${(currMonth + 1).toString().padStart(2, '0')}-${this.textContent.padStart(2, '0')}`;
//   updateAvailableHours(fechaSeleccionadaInput.value);
// }

 /*  renderCalendar();

  prevNextIcon.forEach(icon => { 
    icon.addEventListener("click", () => { 
      currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

      if (currMonth < 0) { 
        const newDate = new Date(currYear, currMonth, new Date().getDate());
        currYear = newDate.getFullYear(); 
        currMonth = 11;
      }
      renderCalendar(); 
    });
  });

  function selectDay(day) {
    const fechaSeleccionadaInput = document.getElementById("fecha_seleccionada_input");
    fechaSeleccionadaInput.value = `${months[currMonth]} ${currYear}-${(currMonth + 1).toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`;
    updateAvailableHours(fechaSeleccionadaInput.value);
  }
 */

  

  /* function updateAvailableHours(selectedDate) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'ruta_al_script_php.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        const response = JSON.parse(xhr.responseText);
      }
    };

    const data = 'fechaSeleccionada=' + encodeURIComponent(fechaSeleccionada);
    xhr.send(data);
  } */


  /* const availableHoursDiv = document.getElementById('available-hours');
  availableHoursDiv.innerHTML = ''; // Limpiar las horas anteriores

  
  const hours = ['9:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00'];
  hours.forEach(hour => {
    const hourBox = document.createElement('div');
    hourBox.className = 'hour-box';
    hourBox.textContent = hour + ' - ' + (parseInt(hour) + 1) + ':00';
    hourBox.onclick = function() {
      selectHour(hour);
    };
    availableHoursDiv.appendChild(hourBox);
  }); */

  



