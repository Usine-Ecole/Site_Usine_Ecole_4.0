// Apprentissgage
const barCanvasRef = document.getElementById("barCanvasRef");

let resolution = document.getElementById("resolution").innerHTML;
let analytique = document.getElementById("analytique").innerHTML;
let critique = document.getElementById("critique").innerHTML;
let creativite = document.getElementById("creativite").innerHTML;
let intuition = document.getElementById("intuition").innerHTML;
let ouverture = document.getElementById("ouverture").innerHTML;

const showPopupRef = (label) => {
  const modalBody = document.getElementById("modalBodyRef");
  const modalLabel = document.getElementById("modalLabelRef");

  modalLabel.textContent = label;

  // Récupérer la valeur correspondante au label
  const value = getValueFromLabelRef(label);

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
  const modalElement = document.getElementById("mdlDetailRef");
  const modal = new bootstrap.Modal(modalElement);
  modal.show();
};

const getLabelIndexRef = (x, y, pointLabels) => {
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

const barChartRef = new Chart(barCanvasRef, {
  type: "radar",
  data: {
    labels: [
      "Résolution de problème",
      "Compétence analytique",
      "Esprit Critique",
      "Créativité",
      "Ouverture à la nouveauté",
      "Intuition",
    ],

    datasets: [
      {
        label: "Réfléxion et imagination ",
        data: [
          resolution,
          analytique,
          critique,
          creativite,
          intuition,
          ouverture,
        ],
        fill: true,
        backgroundColor: "rgba(255,240,194, 0.5)",
        borderColor: "rgb(243,203,0)",
        pointBackgroundColor: "rgb(243,203,0)",
        pointBorderColor: "#fff",
        pointHoverBackgroundColor: "#fff",
        pointHoverBorderColor: "rgb(243,203,0)",
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
      let index = getLabelIndexRef(x, y, chart.scales.r._pointLabelItems);
      if (index === -1) {
        canvas.style.cursor = "default";
      } else {
        canvas.style.cursor = "pointer";
      }
    },
    onClick: ({ x, y }, _activeClick, chart) => {
      let index = getLabelIndexRef(x, y, chart.scales.r._pointLabelItems);
      if (index === -1) {
        return;
      }
      const selectedLabel = chart.data.labels[index];
      showPopupRef(selectedLabel);
    },
  },
});

const getValueFromLabelRef = (label) => {
  // Remplacez cette fonction par la logique appropriée pour récupérer la valeur du label depuis vos données
  // Ici, on utilise un simple tableau pour mapper les labels aux valeurs correspondantes
  const labelValueMap = {
    "Résolution de problème": resolution,
    "Compétence analytique": analytique,
    "Esprit Critique": critique,
    "Créativité": creativite,
    "Ouverture à la nouveauté": ouverture,
    "Intuition": intuition,
  };

  return labelValueMap[label] || "";
};
