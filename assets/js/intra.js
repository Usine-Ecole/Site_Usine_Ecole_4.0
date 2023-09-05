const barCanvasIntra = document.getElementById("barCanvasIntra");

let positive = document.getElementById("positive").innerHTML;
let ethique = document.getElementById("ethique").innerHTML;
let temps = document.getElementById("temps").innerHTML;
let pression = document.getElementById("pression").innerHTML;
let stress = document.getElementById("stress").innerHTML;
let presence = document.getElementById("presence").innerHTML;
let motivation = document.getElementById("motivation").innerHTML;
let confiance = document.getElementById("confiance").innerHTML;
let soi = document.getElementById("soi").innerHTML;
let resilience = document.getElementById("resilience").innerHTML;

const showPopupIntra = (label) => {
  const modalBody = document.getElementById("modalBodyIntra");
  const modalLabel = document.getElementById("modalLabelIntra");

  modalLabel.textContent = label;

  // Récupérer la valeur correspondante au label
  const value = getValueFromLabelIntra(label);

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
  const modalElement = document.getElementById("mdlDetailIntra");
  const modal = new bootstrap.Modal(modalElement);
  modal.show();
};

const getLabelIndexIntra = (x, y, pointLabels) => {
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

const barChartIntra = new Chart(barCanvasIntra, {
  type: "radar",
  data: {
    labels: [
      "Attitude positive",
      "Éthique",
      "Gestion du temps",
      "Capacité à travailler sous pression",
      "Gestion du stress",
      "Présence",
      "Motivation intrinsèque",
      "Faire confiance",
      "Confiance en soi",
      "Résilience",
    ],
    datasets: [
      {
        label: "Compétences intrapersonnelles",
        data: [
          positive,
          ethique,
          temps,
          pression,
          stress,
          presence,
          motivation,
          confiance,
          soi,
          resilience,
        ],
        backgroundColor: "rgba(54, 162, 235, 0.2)",
        borderColor: "rgb(54, 162, 235)",
        pointBackgroundColor: "rgb(54, 162, 235)",
        pointBorderColor: "#fff",
        pointHoverBackgroundColor: "#fff",
        pointHoverBorderColor: "rgb(54, 162, 235)",
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
      let index = getLabelIndexIntra(x, y, chart.scales.r._pointLabelItems);
      if (index === -1) {
        canvas.style.cursor = "default";
      } else {
        canvas.style.cursor = "pointer";
      }
    },
    onClick: ({ x, y }, _activeClick, chart) => {
      let index = getLabelIndexIntra(x, y, chart.scales.r._pointLabelItems);
      if (index === -1) {
        return;
      }
      const selectedLabel = chart.data.labels[index];
      showPopupIntra(selectedLabel);
    },
  },
});

const getValueFromLabelIntra = (label) => {
  // Remplacez cette fonction par la logique appropriée pour récupérer la valeur du label depuis vos données
  // Ici, on utilise un simple tableau pour mapper les labels aux valeurs correspondantes
  const labelValueMap = {
    "Attitude positive": positive,
    "Éthique": ethique,
    "Gestion du temps": temps,
    "Capacité à travailler sous pression": pression,
    "Gestion du stress": stress,
    "Présence": presence,
    "Motivation intrinsèque": motivation,
    "Faire confiance": confiance,
    "Confiance en soi": soi,
    "Résilience": resilience,
  };

  return labelValueMap[label] || "";
};
