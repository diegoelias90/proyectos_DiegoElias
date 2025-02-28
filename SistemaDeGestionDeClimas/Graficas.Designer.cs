namespace SistemaDeGestionDeClimas
{
    partial class Graficas
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.Windows.Forms.DataVisualization.Charting.ChartArea chartArea1 = new System.Windows.Forms.DataVisualization.Charting.ChartArea();
            System.Windows.Forms.DataVisualization.Charting.Legend legend1 = new System.Windows.Forms.DataVisualization.Charting.Legend();
            System.Windows.Forms.DataVisualization.Charting.Series series1 = new System.Windows.Forms.DataVisualization.Charting.Series();
            grafica1 = new System.Windows.Forms.DataVisualization.Charting.Chart();
            label1 = new Label();
            btnGraficar = new Button();
            cbRegionGraficar = new ComboBox();
            btnRegresar = new Button();
            ((System.ComponentModel.ISupportInitialize)grafica1).BeginInit();
            SuspendLayout();
            // 
            // grafica1
            // 
            grafica1.BackColor = Color.Transparent;
            grafica1.BorderlineWidth = 4;
            grafica1.BorderSkin.BorderWidth = 2;
            chartArea1.Name = "ChartArea1";
            grafica1.ChartAreas.Add(chartArea1);
            legend1.Name = "Legend1";
            grafica1.Legends.Add(legend1);
            grafica1.Location = new Point(16, 90);
            grafica1.Name = "grafica1";
            series1.ChartArea = "ChartArea1";
            series1.Legend = "Legend1";
            series1.Name = "Series1";
            grafica1.Series.Add(series1);
            grafica1.Size = new Size(705, 348);
            grafica1.TabIndex = 0;
            grafica1.Text = "chart1";
            // 
            // label1
            // 
            label1.AutoSize = true;
            label1.Location = new Point(117, 25);
            label1.Name = "label1";
            label1.Size = new Size(38, 15);
            label1.TabIndex = 2;
            label1.Text = "label1";
            // 
            // btnGraficar
            // 
            btnGraficar.Location = new Point(231, 60);
            btnGraficar.Name = "btnGraficar";
            btnGraficar.Size = new Size(121, 23);
            btnGraficar.TabIndex = 3;
            btnGraficar.Text = "button1";
            btnGraficar.UseVisualStyleBackColor = true;
            btnGraficar.Click += btnGraficar_Click;
            // 
            // cbRegionGraficar
            // 
            cbRegionGraficar.FormattingEnabled = true;
            cbRegionGraficar.Items.AddRange(new object[] { "Ahuachapán", "Santa Ana", "Sonsonate", "Chalatenango", "La Libertad", "San Salvador", "Cuscatlán", "La Paz", "Cabañas", "San Vicente", "Usulután", "San Miguel", "Morazán", "La Unión" });
            cbRegionGraficar.Location = new Point(78, 61);
            cbRegionGraficar.Name = "cbRegionGraficar";
            cbRegionGraficar.Size = new Size(121, 23);
            cbRegionGraficar.TabIndex = 4;
            // 
            // btnRegresar
            // 
            btnRegresar.Location = new Point(371, 61);
            btnRegresar.Name = "btnRegresar";
            btnRegresar.Size = new Size(121, 23);
            btnRegresar.TabIndex = 5;
            btnRegresar.Text = "button1";
            btnRegresar.UseVisualStyleBackColor = true;
            btnRegresar.Click += btnRegresar_Click;
            // 
            // Graficas
            // 
            AutoScaleDimensions = new SizeF(7F, 15F);
            AutoScaleMode = AutoScaleMode.Font;
            ClientSize = new Size(800, 450);
            Controls.Add(btnRegresar);
            Controls.Add(cbRegionGraficar);
            Controls.Add(btnGraficar);
            Controls.Add(label1);
            Controls.Add(grafica1);
            Name = "Graficas";
            Text = "Form1";
            Load += Graficas_Load;
            ((System.ComponentModel.ISupportInitialize)grafica1).EndInit();
            ResumeLayout(false);
            PerformLayout();
        }

        #endregion

        private System.Windows.Forms.DataVisualization.Charting.Chart grafica1;
        private Label label1;
        private Button btnGraficar;
        private ComboBox cbRegionGraficar;
        private Button btnRegresar;
    }
}