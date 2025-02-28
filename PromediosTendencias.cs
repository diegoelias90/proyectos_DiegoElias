using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace SistemaDeGestionDeClimas
{
    public partial class PromediosTendencias : Form
    {
        public PromediosTendencias()
        {
            InitializeComponent();
            this.BackgroundImage = Image.FromFile("D:\\segundoaño\\modulo2.1\\Programación_DiegoElias#6\\SistemaDeGestionDeClimas\\img\\fondoPromedios.png");
            this.BackgroundImageLayout = ImageLayout.Stretch;
        }

        private void PromediosTendencias_Load(object sender, EventArgs e)
        {
            cbDepaVer.DropDownStyle = ComboBoxStyle.DropDownList; //Para que no sea editable
            groupBox1.Text = "Departamento:";
            groupBox3.Text = "Tendencia fría: ";
            groupBox4.Text = "Tendencia caliente: ";
            groupBox5.Text = "Cálculo de promedios: ";
            btnCalcular.Text = "Calculár: ";
            btnRegresar.Text = "Regresar";

        }

        //Este método me toma como parámetro un número obtenido de el índice de un array de doce posiciones. 
        //Según el índice ingresado se mostrara el elemento ubicado en el mismo índice que se ingresó.
        private string ObtenerMes(int mes)
        {
            string[] nomMeses = { "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" };
            return nomMeses[mes];
        }

        private void CalcularPromedios()
        {
            // Obtener la región seleccionada en el ComboBox
            int depaSelec = cbDepaVer.SelectedIndex;
            string nombreDepa = Convert.ToString(cbDepaVer.SelectedItem);

            //Variables para calcular los promedios
            double sumaTemp = 0, sumaHum = 0, sumaPrec = 0;
            int cantidadDatos = 0;

            //Verificación
            if (cbDepaVer.SelectedIndex == -1)
            {
                MessageBox.Show("Por favor, seleccione un departamento antes de calcular.", "Advertencia", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                return;
            }

            //Este for funciona de la manera en que solamente evalua lo asociado con el departamento seleccionado en el comboBox
            //y va evaluando todos los meses del año. Va sumando los datos de la posición [x, x, 0], [x, x, 1] y [x, x, 2]
            //para hacer el sumatorio de todo lo ingresado en estos parametros con los meses. 
            //También, esta la variable de cantidadDatos que me va a sumar las veces que se corra el for.
            //Al finalizar, los datos guardados (sumatorias) se dividiran entre la cantidad de datos para 
            //sacar así un promedio anual de los datos climáticos.
            for (int j = 0; j < 12; j++)
            {
                sumaTemp += Main.datosClimaticos[depaSelec, j, 0];
                sumaHum += Main.datosClimaticos[depaSelec, j, 1];
                sumaPrec += Main.datosClimaticos[depaSelec, j, 2];
                cantidadDatos++;
            }

            double tempProm = sumaTemp / cantidadDatos;
            double humProm = sumaHum / cantidadDatos;
            double precProm = sumaPrec / cantidadDatos;

            //Aquí, los datos que fueron evaluados anteriormente (promedios) son ingresados a un listBox para 
            //Imprimir los datos. La función F2 hace que como son datos decimales, estos se aproximen y solo muestren dos dígitos.
            lbPromedios.Items.Clear();
            lbPromedios.Items.Add($"Departamento: {nombreDepa}");
            lbPromedios.Items.Add($"Temp: {tempProm:F2}°C");
            lbPromedios.Items.Add($"Humedad: {humProm:F2}%");
            lbPromedios.Items.Add($"Precipitación: {precProm:F2}mm");
        }

        

        private void IdentificarTendencias()
        {
            //Arrays para las temperaturas promediadas
            double[] tempProm = new double[12];
            //Array para las precipitaciones promediadas
            double[] precProm = new double[12];

            //En este for voy ingresando 
            //(cada casilla en el for se me llenará con los datos que estoy sacando de el array datosClimaticos)
            for (int mes = 0; mes < 12; mes++)
            {
                for (int dep = 0; dep < 14; dep++)
                {
                    tempProm[mes] += Main.datosClimaticos[dep, mes, 0];
                    precProm[mes] += Main.datosClimaticos[dep, mes, 2];
                }
                //Aquí, se divide el promedio de cada mes entre catorce porque es la cantidad de departamentos
                //que hay, y para conocer el promedio de cada uno se divide.
                tempProm[mes] /= 14;
                precProm[mes] /= 14;
            }

            //Aquí se calcula dentro del array tempProm la temperatura (máxima o mínima) de cada caso
            //y busca el index de esa temperatura máxima. Esto servirá para usar el método ObtenerMes 
            //despúes, que ahí dependiendo del índice, mostrará así el nombre del mes con mayor o menos temperatura.
            int mesMasCalido = Array.IndexOf(tempProm, tempProm.Max());
            int mesMasFrio = Array.IndexOf(tempProm, tempProm.Min());
            string nombreMesCalido = ObtenerMes(mesMasCalido);
            string nombreMesFrio = ObtenerMes(mesMasFrio);

            //Lo mismo pero en el array precProm
            int mesMasLluvioso = Array.IndexOf(precProm, precProm.Max());
            int mesMasSeco = Array.IndexOf(precProm, precProm.Min());
            string nombreMesMasLluvioso = ObtenerMes(mesMasLluvioso);
            string nombreMesMasSeco = ObtenerMes(mesMasSeco);

            // Limpiar los listBox antes de agregar datos
            lbTendenciaCaliente.Items.Clear();
            lbTendenciaFria.Items.Clear();


            // Mostrar los nombres de los meses en lugar de números
            lbTendenciaCaliente.Items.Add($"Mes más cálido: {nombreMesCalido}");
            lbTendenciaFria.Items.Add($"Mes más frío: {nombreMesFrio}");
            lbTendenciaFria.Items.Add($"Mes más lluvioso: {nombreMesMasLluvioso}");
            lbTendenciaCaliente.Items.Add($"Mes más seco: {nombreMesMasSeco}");
        }
        private void btnCalcular_Click(object sender, EventArgs e)
        {
            // Limpiar dgvDatosSeleccion y los listBox al iniciar
            lbPromedios.Items.Clear();
            lbTendenciaFria.Items.Clear();
            lbTendenciaCaliente.Items.Clear();

            CalcularPromedios();
            IdentificarTendencias();

        }

        private void btnRegresar_Click(object sender, EventArgs e)
        {
            this.Close();
        }
    }
}
