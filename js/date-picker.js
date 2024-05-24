function DatePicker() {
    // Atributo para almacenar la diferencia entre fechas
    this.diff = 0;
  
    // Método para abrir el calendario
    this.openCalendar = function(triggerElement) {
      // Función para obtener el número de días en un mes
      function daysInMonth(month, year) {
        return new Date(year, month + 1, 0).getDate();
      }
  
      // Función para generar el calendario
      function generateCalendar(month, year) {
        let currentDate = new Date();
        let firstDayOfMonth = new Date(year, month, 1).getDay();
        let totalDaysInMonth = daysInMonth(month, year);
        let calendarBody = document.querySelector('.calendar-body');
        calendarBody.innerHTML = '';
  
        // Agrega los días del mes anterior
        for (let i = firstDayOfMonth - 1; i >= 0; i--) {
          let prevMonthDay = document.createElement('div');
          prevMonthDay.textContent = daysInMonth(month - 1, year) - i;
          prevMonthDay.classList = "day prev-month";
          calendarBody.appendChild(prevMonthDay);
        }
  
        // Agrega los días del mes actual
        for (let i = 1; i <= totalDaysInMonth; i++) {
          let day = document.createElement('div');
          day.textContent = i;
          day.classList = "day current-month";
          calendarBody.appendChild(day);
        }
  
        // Agrega los días del mes siguiente para completar la tabla
        let remainingDays = 42 - (totalDaysInMonth + firstDayOfMonth);
        for (let i = 1; i <= remainingDays; i++) {
          let nextMonthDay = document.createElement('div');
          nextMonthDay.textContent = i;
          nextMonthDay.classList = "day next-month";
          calendarBody.appendChild(nextMonthDay);
        }
      }
  
      // Crear el contenedor del calendario
      let calendarWrapper = document.createElement("div");
      calendarWrapper.classList = "calendar-wrapper";
      
      // Agregar el calendario al contenedor
      let calendarContent = `
        <div class="calendar-header">
          <button class="prev-month">&lt;</button>
          <span class="current-month"></span>
          <button class="next-month">&gt;</button>
        </div>
        <div class="calendar-body"></div>
      `;
      calendarWrapper.innerHTML = calendarContent;
  
      // Agregar el contenedor del calendario al documento
      triggerElement.appendChild(calendarWrapper);
  
      // Mostrar el calendario
      let currentDate = new Date();
      let currentMonth = currentDate.getMonth();
      let currentYear = currentDate.getFullYear();
      generateCalendar(currentMonth, currentYear);
  
      // Actualizar el mes mostrado
      let currentMonthElement = calendarWrapper.querySelector('.current-month');
      currentMonthElement.textContent = `${currentDate.toLocaleString('default', { month: 'long' })} ${currentYear}`;
  
      // Escuchar eventos para cambiar de mes
      let prevMonthButton = calendarWrapper.querySelector('.prev-month');
      prevMonthButton.addEventListener('click', function() {
        if (currentMonth === 0) {
          currentYear--;
          currentMonth = 11;
        } else {
          currentMonth--;
        }
        generateCalendar(currentMonth, currentYear);
        currentMonthElement.textContent = `${new Date(currentYear, currentMonth).toLocaleString('default', { month: 'long' })} ${currentYear}`;
      });
  
      let nextMonthButton = calendarWrapper.querySelector('.next-month');
      nextMonthButton.addEventListener('click', function() {
        if (currentMonth === 11) {
          currentYear++;
          currentMonth = 0;
        } else {
          currentMonth++;
        }
        generateCalendar(currentMonth, currentYear);
        currentMonthElement.textContent = `${new Date(currentYear, currentMonth).toLocaleString('default', { month: 'long' })} ${currentYear}`;
      });
    };
  }
  
  const datePicker = new DatePicker();
 
  function openDatePicker() {
    // Obtén el contenedor del calendario
    const calendarContainer = document.querySelector('.calendarWr');

    // Verifica si ya hay un calendario presente
    const existingCalendar = document.querySelector('.calendar-wrapper');

    // Si hay un calendario existente, ciérralo
    if (existingCalendar) {
        existingCalendar.remove(); // Elimina el calendario existente
    } else {
        // Si no hay un calendario existente, crea uno nuevo y ábrelo
        const newCalendarWrapper = document.createElement('div');
        newCalendarWrapper.classList.add('calendar-wrapper');
        calendarContainer.appendChild(newCalendarWrapper);
        datePicker.openCalendar(newCalendarWrapper);
    }
}


