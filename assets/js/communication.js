const barCanvasCom = document.getElementById("barCanvasCom");

let orale = document.getElementById("orale").innerHTML;
let ecrite = document.getElementById("ecrite").innerHTML;
let nonverbale = document.getElementById("nonverbale").innerHTML;
let active = document.getElementById("active").innerHTML;

const showPopupCom = (label) => {
  const modalBody = document.getElementById("modalBodyCom");
  const modalLabel = document.getElementById("modalLabelCom");

modalLabel.textContent = label;

// Récupérer la valeur correspondante au label
const value = getValueFromLabelCom(label);

// Vérifier les conditions et mettre à jour la valeur en conséquence
let popupValue = "";
if (parseInt(value) === 20) {
  popupValue = "Besoin d'aide: 20%";
} else if (parseInt(value) === 40) {
  popupValue = "Compliqué pour moi: 40%";
} else if (parseInt(value) === 70) {
  popupValue = "En cours d'acquisition: 70%";
} else if (parseInt(value) === 100) {
  popupValue = "Acquis: 100%";
}

// Afficher le label et la valeur mise à jour dans le corps de la modal
modalBody.innerHTML = `<h3>${label}</h3><hr><p>${popupValue}</p>`;

// Afficher la modale
const modalElement = document.getElementById("mdlDetailCom");
const modal = new bootstrap.Modal(modalElement);
modal.show();
};

const getLabelIndexCom = (x, y, pointLabels) => {
  let index = -1;

  for (let i = 0; i < pointLabels.length; i++) {
    const { top, right, bottom, left } = pointLabels[i];

    if (x >= left && x <= right && y >= top && y <= bottom) {
      index = i;
      break;
    }
  }
  return index;
};

const barChartCom = new Chart(barCanvasCom, {
  type: "radar",
  data: {
    labels: [
      "Communication orale",
      "Communication écrite",
      "Communication non verbale",
      "Écoute active",
    ],

    datasets: [
      {
        label: "Communication ",
        data: [orale, ecrite, nonverbale, active],
        fill: true,
        backgroundColor: "rgba(221,160,221,0.5)",
        borderColor: "rgb(152,52,212)",
        pointBackgroundColor: "rgb(152,52,212)",
        pointBorderColor: "#fff",
        pointHoverBackgroundColor: "#fff",
        pointHoverBorderColor: "rgb(152,52,212)",
      },
    ],
  },
  options: {
    scale: {
      r: {
        beginAtZero: true,
        min: 0,
        max: 100,
        stepSize: 20,
      },
    },
    onHover: ({ x, y }, _activeHover, chart) => {
      const { canvas } = chart;
      let index = getLabelIndexCom(x, y, chart.scales.r._pointLabelItems);
      if (index === -1) {
        canvas.style.cursor = "default";
      } else {
        canvas.style.cursor = "pointer";
      }
    },
    onClick: ({ x, y }, _activeClick, chart) => {
      let index = getLabelIndexCom(x, y, chart.scales.r._pointLabelItems);
      if (index === -1) {
        return;
      }
      const selectedLabel = chart.data.labels[index];
      showPopupCom(selectedLabel);
    },
  },
});



const getValueFromLabelCom = (label) => {
  // Remplacez cette fonction par la logique appropriée pour récupérer la valeur du label depuis vos données
  // Ici, on utilise un simple tableau pour mapper les labels aux valeurs correspondantes
  const labelValueMap = {
    "Communication orale": orale,
      "Communication écrite": ecrite,
      "Communication non verbale": nonverbale,
      "Écoute active": active,
  };

  return labelValueMap[label] || "";
};
