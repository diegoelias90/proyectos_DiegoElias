using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Windows.Forms.DataVisualization.Charting;

namespace SistemaDeGestionDeClimas
{
    public partial class Graficas : Form
    {
        public Graficas()
        {
            InitializeComponent();
            this.BackgroundImage = Image.FromFile("D:\\segundoaño\\modulo2.1\\Programación_DiegoElias#6\\SistemaDeGestionDeClimas\\img\\fondoGraficos.png");
            this.BackgroundImageLayout = ImageLayout.Stretch;
        }

        private void Graficas_Load(object sender, EventArgs e)
        {
            label1.Text = "Graficar departamento:";
            btnGraficar.Text = "Graficar";
            btnRegresar.Text = "Regresar";
        }

        private void btnGraficar_Click(object sender, EventArgs e)
        {
            //Declara como la selección del comboBox para regiones como departamento. 
            //Si la selección del departamento es mayor a cero (osea, si ha sido seleccionado) 
            //se hará el proceso de la gráfica, sino se pide que se seleccione un departamento.
            int departamento = cbRegionGraficar.SelectedIndex;
            if (departamento >= 0)
            {
                GenerarGrafico(departamento);
            }
            else
            {
                MessageBox.Show("Seleccione un departamento primero.");
            }
        }

        //Primero, esta clase me toma como parámetro el índice de la selección del comboBox cbRegionGraficar
        //
        private void GenerarGrafico(int departamento)
        {
            //Limpia todas las series en la gráfica.
            grafica1.Series.Clear();

            //Crea las series de cada parámetro del array (temperatura, humedad y precipitación).
            var serieTemp = new Series("Temperatura") { ChartType = SeriesChartType.Line };
            var serieHum = new Series("Humedad") { ChartType = SeriesChartType.Line };
            var seriePrec = new Series("Precipitación") { ChartType = SeriesChartType.Line };

            //Le va dando los puntos (x, y) a cada serie.
            for (int mes = 0; mes < 12; mes++)
            {
                serieTemp.Points.AddXY(mes + 1, Main.datosClimaticos[departamento, mes, 0]);
                serieHum.Points.AddXY(mes + 1, Main.datosClimaticos[departamento, mes, 1]);
                seriePrec.Points.AddXY(mes + 1, Main.datosClimaticos[departamento, mes, 2]);

                //Le da un ancho de cinco a las lineas de la serie para ser más visibles
                serieTemp.BorderWidth = 5;
                serieHum.BorderWidth = 5;
                seriePrec.BorderWidth = 5;
            }

            //Agrega las series declaradas a la gráfica para ser vistas.
            grafica1.Series.Add(serieTemp);
            grafica1.Series.Add(serieHum);
            grafica1.Series.Add(seriePrec);

            grafica1.Titles.Clear();
            grafica1.Titles.Add("Evolución Climática Mensual");
        }

        private void btnRegresar_Click(object sender, EventArgs e)
        {
            this.Close();
        }
    }
}
