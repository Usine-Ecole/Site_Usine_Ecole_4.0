// Apprentissgage
const barCanvasLead = document.getElementById("barCanvasLead");

let responsabilite = document.getElementById("responsabilite").innerHTML;
let incertitude = document.getElementById("incertitude").innerHTML;
let vision = document.getElementById("vision").innerHTML;
let strategique = document.getElementById("strategique").innerHTML;
let decision = document.getElementById("decision").innerHTML;
let integrite = document.getElementById("integrite").innerHTML;
let audace = document.getElementById("audace").innerHTML;
let negociation = document.getElementById("negociation").innerHTML;
let emotionnelle = document.getElementById("emotionnelle").innerHTML;
let professionnalisme = document.getElementById("professionnalisme").innerHTML;

const showPopupLead = (label) => {
  const modalBody = document.getElementById("modalBodyLead");
  const modalLabel = document.getElementById("modalLabelLead");

  modalLabel.textContent = label;

  // Récupérer la valeur correspondante au label
  const value = getValueFromLabelLead(label);

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
  const modalElement = document.getElementById("mdlDetailLead");
  const modal = new bootstrap.Modal(modalElement);
  modal.show();
};

const getLabelIndexLead = (x, y, pointLabels) => {
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

const barChartLead = new Chart(barCanvasLead, {
  type: "radar",
  data: {
    labels: [
      "Responsabilité",
      "Capacité à faire face à l'incertitude",
      "Vision, visualisation",
      "Pensée stratégique",
      "Jugement et prise de décision",
      "Intégrité",
      "Audace",
      "Négociation",
      "Intelligence émotionnelle",
      "Professionnalisme",
    ],

    datasets: [
      {
        label: "Leadership",
        data: [
          responsabilite,
          incertitude,
          vision,
          strategique,
          decision,
          integrite,
          audace,
          negociation,
          emotionnelle,
          professionnalisme,
        ],
        fill: true,
        backgroundColor: "rgba(200,230,201, 0.5)",
        borderColor: "rgb(56,142,60)",
        pointBackgroundColor: "rgb(56,142,60)",
        pointBorderColor: "#fff",
        pointHoverBackgroundColor: "#fff",
        pointHoverBorderColor: "rgb(56,142,60)",
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
      let index = getLabelIndexLead(x, y, chart.scales.r._pointLabelItems);
      if (index === -1) {
        canvas.style.cursor = "default";
      } else {
        canvas.style.cursor = "pointer";
      }
    },
    onClick: ({ x, y }, _activeClick, chart) => {
      let index = getLabelIndexLead(x, y, chart.scales.r._pointLabelItems);
      if (index === -1) {
        return;
      }
      const selectedLabel = chart.data.labels[index];
      showPopupLead(selectedLabel);
    },
  },
});

const getValueFromLabelLead = (label) => {
  // Remplacez cette fonction par la logique appropriée pour récupérer la valeur du label depuis vos données
  // Ici, on utilise un simple tableau pour mapper les labels aux valeurs correspondantes
  const labelValueMap = {
    "Responsabilité": responsabilite,
    "Capacité à faire face à l'incertitude": incertitude,
    "Vision, visualisation": vision,
    "Pensée stratégique": strategique,
    "Jugement et prise de décision": decision,
    "Intégrité": integrite,
    "Audace": audace,
    "Négociation": negociation,
    "Intelligence émotionnelle": emotionnelle,
    "Professionnalisme": professionnalisme,
  };

  return labelValueMap[label] || "";
};
