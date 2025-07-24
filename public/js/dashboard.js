const monthYear = document.getElementById("monthYear");
    const calendarDates = document.getElementById("calendarDates");
    let currentDate = new Date();

    function renderCalendar(date) {
      const year = date.getFullYear();
      const month = date.getMonth();
      const today = new Date();

      const firstDay = new Date(year, month, 1).getDay();
      const lastDate = new Date(year, month + 1, 0).getDate();

      monthYear.textContent = date.toLocaleString("default", {
        month: "long",
        year: "numeric"
      });

      calendarDates.innerHTML = "";

      for (let i = 0; i < firstDay; i++) {
        calendarDates.innerHTML += `<div></div>`;
      }

      for (let i = 1; i <= lastDate; i++) {
        const isToday =
          i === today.getDate() &&
          month === today.getMonth() &&
          year === today.getFullYear();

        calendarDates.innerHTML += `<div class="py-2 rounded ${
          isToday ? "bg-[#3a506b] font-bold" : "hover:bg-white hover:text-[#1c2541] transition"
        }">${i}</div>`;
      }
    }

    function changeMonth(offset) {
      currentDate.setMonth(currentDate.getMonth() + offset);
      renderCalendar(currentDate);
    }

    renderCalendar(currentDate);