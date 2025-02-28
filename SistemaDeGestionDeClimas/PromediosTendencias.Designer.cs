namespace SistemaDeGestionDeClimas
{
    partial class PromediosTendencias
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
            groupBox1 = new GroupBox();
            btnRegresar = new Button();
            btnCalcular = new Button();
            cbDepaVer = new ComboBox();
            groupBox3 = new GroupBox();
            lbTendenciaFria = new ListBox();
            groupBox4 = new GroupBox();
            lbTendenciaCaliente = new ListBox();
            groupBox5 = new GroupBox();
            lbPromedios = new ListBox();
            groupBox1.SuspendLayout();
            groupBox3.SuspendLayout();
            groupBox4.SuspendLayout();
            groupBox5.SuspendLayout();
            SuspendLayout();
            // 
            // groupBox1
            // 
            groupBox1.BackColor = Color.Transparent;
            groupBox1.Controls.Add(btnRegresar);
            groupBox1.Controls.Add(btnCalcular);
            groupBox1.Controls.Add(cbDepaVer);
            groupBox1.Location = new Point(15, 12);
            groupBox1.Name = "groupBox1";
            groupBox1.Size = new Size(155, 236);
            groupBox1.TabIndex = 0;
            groupBox1.TabStop = false;
            groupBox1.Text = "groupBox1";
            // 
            // btnRegresar
            // 
            btnRegresar.Location = new Point(16, 200);
            btnRegresar.Name = "btnRegresar";
            btnRegresar.Size = new Size(121, 23);
            btnRegresar.TabIndex = 2;
            btnRegresar.Text = "button1";
            btnRegresar.UseVisualStyleBackColor = true;
            btnRegresar.Click += btnRegresar_Click;
            // 
            // btnCalcular
            // 
            btnCalcular.Location = new Point(16, 167);
            btnCalcular.Name = "btnCalcular";
            btnCalcular.Size = new Size(121, 27);
            btnCalcular.TabIndex = 1;
            btnCalcular.Text = "button1";
            btnCalcular.UseVisualStyleBackColor = true;
            btnCalcular.Click += btnCalcular_Click;
            // 
            // cbDepaVer
            // 
            cbDepaVer.FormattingEnabled = true;
            cbDepaVer.Items.AddRange(new object[] { "Ahuachapán", "Santa Ana", "Sonsonate", "Chalatenango", "La Libertad", "San Salvador", "Cuscatlán", "La Paz", "Cabañas", "San Vicente", "Usulután", "San Miguel", "Morazán", "La Unión" });
            cbDepaVer.Location = new Point(16, 28);
            cbDepaVer.Name = "cbDepaVer";
            cbDepaVer.Size = new Size(121, 23);
            cbDepaVer.TabIndex = 0;
            // 
            // groupBox3
            // 
            groupBox3.BackColor = Color.Transparent;
            groupBox3.Controls.Add(lbTendenciaFria);
            groupBox3.Location = new Point(180, 21);
            groupBox3.Name = "groupBox3";
            groupBox3.Size = new Size(299, 227);
            groupBox3.TabIndex = 2;
            groupBox3.TabStop = false;
            groupBox3.Text = "groupBox3";
            // 
            // lbTendenciaFria
            // 
            lbTendenciaFria.BackColor = Color.LightSalmon;
            lbTendenciaFria.FormattingEnabled = true;
            lbTendenciaFria.ItemHeight = 15;
            lbTendenciaFria.Location = new Point(7, 22);
            lbTendenciaFria.Name = "lbTendenciaFria";
            lbTendenciaFria.Size = new Size(286, 184);
            lbTendenciaFria.TabIndex = 0;
            // 
            // groupBox4
            // 
            groupBox4.BackColor = Color.Transparent;
            groupBox4.Controls.Add(lbTendenciaCaliente);
            groupBox4.Location = new Point(488, 21);
            groupBox4.Name = "groupBox4";
            groupBox4.Size = new Size(300, 227);
            groupBox4.TabIndex = 3;
            groupBox4.TabStop = false;
            groupBox4.Text = "groupBox4";
            // 
            // lbTendenciaCaliente
            // 
            lbTendenciaCaliente.BackColor = SystemColors.GradientInactiveCaption;
            lbTendenciaCaliente.FormattingEnabled = true;
            lbTendenciaCaliente.ItemHeight = 15;
            lbTendenciaCaliente.Location = new Point(8, 22);
            lbTendenciaCaliente.Name = "lbTendenciaCaliente";
            lbTendenciaCaliente.Size = new Size(286, 184);
            lbTendenciaCaliente.TabIndex = 0;
            // 
            // groupBox5
            // 
            groupBox5.BackColor = Color.Transparent;
            groupBox5.Controls.Add(lbPromedios);
            groupBox5.Location = new Point(15, 254);
            groupBox5.Name = "groupBox5";
            groupBox5.Size = new Size(773, 124);
            groupBox5.TabIndex = 4;
            groupBox5.TabStop = false;
            groupBox5.Text = "groupBox5";
            // 
            // lbPromedios
            // 
            lbPromedios.FormattingEnabled = true;
            lbPromedios.ItemHeight = 15;
            lbPromedios.Location = new Point(6, 22);
            lbPromedios.Name = "lbPromedios";
            lbPromedios.Size = new Size(761, 94);
            lbPromedios.TabIndex = 0;
            // 
            // PromediosTendencias
            // 
            AutoScaleDimensions = new SizeF(7F, 15F);
            AutoScaleMode = AutoScaleMode.Font;
            ClientSize = new Size(800, 450);
            Controls.Add(groupBox5);
            Controls.Add(groupBox4);
            Controls.Add(groupBox3);
            Controls.Add(groupBox1);
            Name = "PromediosTendencias";
            Text = "Form1";
            Load += PromediosTendencias_Load;
            groupBox1.ResumeLayout(false);
            groupBox3.ResumeLayout(false);
            groupBox4.ResumeLayout(false);
            groupBox5.ResumeLayout(false);
            ResumeLayout(false);
        }

        #endregion

        private GroupBox groupBox1;
        private Button btnCalcular;
        private ComboBox cbDepaVer;
        private GroupBox groupBox3;
        private ListBox lbTendenciaFria;
        private GroupBox groupBox4;
        private ListBox lbTendenciaCaliente;
        private GroupBox groupBox5;
        private ListBox lbPromedios;
        private Button btnRegresar;
    }
}