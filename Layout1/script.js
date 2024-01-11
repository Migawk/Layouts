const home = document.getElementById("home");
const speakers = document.getElementById("speakers");
const schedule = document.getElementById("schedule");
const ticket = document.getElementById("ticket");
const contact = document.getElementById("contact");

const register = document.querySelector(".register");

function setSelected(selected) {
  home.className = "unselectedNav";
  speakers.className = "unselectedNav";
  schedule.className = "unselectedNav";
  ticket.className = "unselectedNav";
  contact.className = "unselectedNav";

  if (!selected) return;
  document.getElementById(selected).className = "selectedNav";
}

document.addEventListener("click", (ev) => {
  switch (ev.target.id) {
    case "home":
    case "speakers":
    case "schedule":
    case "ticket":
    case "contact":
      setSelected(ev.target.id);
      break;
    default:
      setSelected('');
  }

  if (ev.target == register) {
    const { clientX: x1, clientY: y1 } = ev;
    const { left: x2, top: y2 } = register.getBoundingClientRect();

    (async () => {
      for (let i = 0; i < 50; i++) {
        
        await new Promise((res) => setTimeout(res, 10)); // sleep function

        register.style.background = `radial-gradient(circle at ${x1 - x2}px ${
          y1 - y2
        }px, #00D4FC ${i*2+9}%, #3a3a3a ${i*2+10}%)`;
      }
    })();
  }
});
