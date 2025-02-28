using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text; 
using System.Text.RegularExpressions;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace SistemaDeGestionDeClimas
{
    public partial class Ingresar : Form
    {
        public Ingresar()
        {
            InitializeComponent();
            this.BackgroundImage = Image.FromFile("D:\\segundoaño\\modulo2.1\\Programación_DiegoElias#6\\SistemaDeGestionDeClimas\\img\\fondoIngresos.png");
            this.BackgroundImageLayout = ImageLayout.Stretch;
        }

        private void Ingresar_Load(object sender, EventArgs e)
        {
            //Cargar nombres de elementos:
            label1.Text = "Ingreso de datos climáticos";
            groupBox1.Text = "Datos:";
            groupBox2.Text = "Datos cargados:";
            label2.Text = "Departamento:";
            label3.Text = "Mes:";
            label4.Text = "Temperatura (°C):";
            label5.Text = "%Humedad:";
            label6.Text = "Precipitación (mm):";
            btnGuardar.Text = "Guardar dato";
            btnRegresar.Text = "Regresar";

            //Desde que el formulario se carga se restinge al usuario a que pueda editar el comboBox
            cbDepartamento.DropDownStyle = ComboBoxStyle.DropDownList;
            cbMes.DropDownStyle = ComboBoxStyle.DropDownList;

            // Configuración de encabezados del DataGridView
            dgvDatos.ColumnCount = 5; // 5 columnas

            dgvDatos.Columns[0].Name = "Departamento";
            dgvDatos.Columns[1].Name = "Mes";
            dgvDatos.Columns[2].Name = "Temperatura (°C)";
            dgvDatos.Columns[3].Name = "Humedad (%)";
            dgvDatos.Columns[4].Name = "Precipitación (mm)";

            // Opcional: ajustar el ancho de las columnas automáticamente
            dgvDatos.AutoSizeColumnsMode = DataGridViewAutoSizeColumnsMode.Fill;

        }

        private void btnGuardar_Click(object sender, EventArgs e)
        {
            //Declaración de variables:
            int depaSelec = cbDepartamento.SelectedIndex; //Selecciones del comboBox
            int mesSelec = cbMes.SelectedIndex;//Selecciones del comboBox
            double temperatura = double.Parse(txtTemperatura.Text);
            double humedad = double.Parse(txtHumedad.Text);
            double precipitacion = double.Parse(txtPrecipitacion.Text);

            string depaNombre = Convert.ToString(cbDepartamento.SelectedItem);
            string mesNombre = Convert.ToString(cbMes.SelectedItem);


            //
            //Condiciones para que se ejecute el código
            //

            //Validación de que las selecciones de los comboBox no sean nulos
            if (depaSelec < 0 || mesSelec < 0)
            {
                MessageBox.Show("Seleccione una región y un mes.");
                return;
            }

            //Validación de que la temperatura ingresada no sea nula
            if ((temperatura <= 0))
            {
                MessageBox.Show("Valor de: temperatura inválido.");
                return;
            }

            //Validación de que la humedad ingresada no sea nula
            if (humedad <= 0)
            {
                MessageBox.Show("Valor de: humedad inválido.");
                return;
            }

            // Validación de que la precipitación no sea nula
            if (precipitacion <= 0)
            {
                MessageBox.Show("Valor de: precipitación inválido.");
                return;
            }

            //
            //Fin de las condiciones
            //

            //
            // Verifiación con las selecciones de los listBox y parámetros
            //

            //Parámetro 0 en array de datosClimaticos es igual a la temperatura
            if (Main.datosClimaticos[depaSelec, mesSelec, 0] != 0 || Main.datosClimaticos[depaSelec, mesSelec, 0] != 0)
            {
                MessageBox.Show("Posición ocupada.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                return;
            }

            //Parámetro 1 en array de datosClimaticos es igual a la humedad
            if (Main.datosClimaticos[depaSelec, mesSelec, 1] != 0 || Main.datosClimaticos[depaSelec, mesSelec, 1] != 0)
            {
                MessageBox.Show("Posición ocupada.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                return;
            }

            //Parámetro 2 en array de datosClimaticos es igual a la precipitación
            if (Main.datosClimaticos[depaSelec, mesSelec, 1] != 0 || Main.datosClimaticos[depaSelec, mesSelec, 1] != 0)
            {
                MessageBox.Show("Posición ocupada.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                return;
            }
            //
            // Verifiación con las selecciones de los listBox y parámetros
            //

            //Guardo los datos en el array de tres dimensiones
            //Estos datos indican que la selección de la región y mes se guarda en la casilla de xy, y
            // los espacios de los niveles (0,1,2) se les guarda los datos de temperatura, humedad y precipitación.
            Main.datosClimaticos[depaSelec, mesSelec, 0] = temperatura;
            Main.datosClimaticos[depaSelec, mesSelec, 1] = humedad;
            Main.datosClimaticos[depaSelec, mesSelec, 2] = precipitacion;

            //Agrego los datos al listBox(listBox1) y al DataGridView(dgvDatos)
            //Posteriormente los muestro en el lb o dgv
            lbDatos.Items.Add($"{depaNombre} - {mesNombre}: Temp {temperatura}°C, Hum {humedad}%, Prec {precipitacion}mm");
            dgvDatos.Rows.Add(depaNombre, mesNombre, temperatura, humedad, precipitacion);
        }

        private void btnRegresar_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void dgvDatos_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }
    }
}
