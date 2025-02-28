namespace SistemaDeGestionDeClimas
{
    partial class Ingresar
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
            label1 = new Label();
            groupBox1 = new GroupBox();
            txtPrecipitacion = new TextBox();
            txtHumedad = new TextBox();
            txtTemperatura = new TextBox();
            cbMes = new ComboBox();
            cbDepartamento = new ComboBox();
            label6 = new Label();
            label5 = new Label();
            label4 = new Label();
            label3 = new Label();
            label2 = new Label();
            groupBox2 = new GroupBox();
            btnRegresar = new Button();
            btnGuardar = new Button();
            lbDatos = new ListBox();
            dgvDatos = new DataGridView();
            groupBox1.SuspendLayout();
            groupBox2.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)dgvDatos).BeginInit();
            SuspendLayout();
            // 
            // label1
            // 
            label1.AutoSize = true;
            label1.BackColor = Color.Transparent;
            label1.Font = new Font("Showcard Gothic", 14.25F, FontStyle.Regular, GraphicsUnit.Point, 0);
            label1.Location = new Point(323, 9);
            label1.Name = "label1";
            label1.Size = new Size(74, 23);
            label1.TabIndex = 0;
            label1.Text = "label1";
            // 
            // groupBox1
            // 
            groupBox1.BackColor = Color.Transparent;
            groupBox1.Controls.Add(txtPrecipitacion);
            groupBox1.Controls.Add(txtHumedad);
            groupBox1.Controls.Add(txtTemperatura);
            groupBox1.Controls.Add(cbMes);
            groupBox1.Controls.Add(cbDepartamento);
            groupBox1.Controls.Add(label6);
            groupBox1.Controls.Add(label5);
            groupBox1.Controls.Add(label4);
            groupBox1.Controls.Add(label3);
            groupBox1.Controls.Add(label2);
            groupBox1.Font = new Font("Showcard Gothic", 9F, FontStyle.Regular, GraphicsUnit.Point, 0);
            groupBox1.Location = new Point(12, 33);
            groupBox1.Name = "groupBox1";
            groupBox1.Padding = new Padding(0);
            groupBox1.Size = new Size(238, 405);
            groupBox1.TabIndex = 1;
            groupBox1.TabStop = false;
            groupBox1.Text = "groupBox1";
            // 
            // txtPrecipitacion
            // 
            txtPrecipitacion.Font = new Font("Segoe UI", 9F);
            txtPrecipitacion.Location = new Point(31, 368);
            txtPrecipitacion.Name = "txtPrecipitacion";
            txtPrecipitacion.Size = new Size(159, 23);
            txtPrecipitacion.TabIndex = 9;
            // 
            // txtHumedad
            // 
            txtHumedad.Font = new Font("Segoe UI", 9F);
            txtHumedad.Location = new Point(31, 291);
            txtHumedad.Name = "txtHumedad";
            txtHumedad.Size = new Size(159, 23);
            txtHumedad.TabIndex = 8;
            // 
            // txtTemperatura
            // 
            txtTemperatura.Font = new Font("Segoe UI", 9F);
            txtTemperatura.Location = new Point(31, 209);
            txtTemperatura.Name = "txtTemperatura";
            txtTemperatura.Size = new Size(159, 23);
            txtTemperatura.TabIndex = 7;
            // 
            // cbMes
            // 
            cbMes.Font = new Font("Segoe UI", 9F);
            cbMes.FormattingEnabled = true;
            cbMes.Items.AddRange(new object[] { "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" });
            cbMes.Location = new Point(31, 130);
            cbMes.Name = "cbMes";
            cbMes.Size = new Size(141, 23);
            cbMes.TabIndex = 6;
            // 
            // cbDepartamento
            // 
            cbDepartamento.Font = new Font("Segoe UI", 9F);
            cbDepartamento.FormattingEnabled = true;
            cbDepartamento.Items.AddRange(new object[] { "Ahuachapán", "Santa Ana", "Sonsonate", "Chalatenango", "La Libertad", "San Salvador", "Cuscatlán", "La Paz", "Cabañas", "San Vicente", "Usulután", "San Miguel", "Morazán", "La Unión" });
            cbDepartamento.Location = new Point(31, 57);
            cbDepartamento.Name = "cbDepartamento";
            cbDepartamento.Size = new Size(141, 23);
            cbDepartamento.TabIndex = 5;
            // 
            // label6
            // 
            label6.AutoSize = true;
            label6.Font = new Font("Segoe UI", 9F);
            label6.Location = new Point(18, 334);
            label6.Name = "label6";
            label6.Size = new Size(38, 15);
            label6.TabIndex = 4;
            label6.Text = "label6";
            // 
            // label5
            // 
            label5.AutoSize = true;
            label5.Font = new Font("Segoe UI", 9F);
            label5.Location = new Point(18, 255);
            label5.Name = "label5";
            label5.Size = new Size(38, 15);
            label5.TabIndex = 3;
            label5.Text = "label5";
            // 
            // label4
            // 
            label4.AutoSize = true;
            label4.Font = new Font("Segoe UI", 9F);
            label4.Location = new Point(18, 171);
            label4.Name = "label4";
            label4.Size = new Size(38, 15);
            label4.TabIndex = 2;
            label4.Text = "label4";
            // 
            // label3
            // 
            label3.AutoSize = true;
            label3.Font = new Font("Segoe UI", 9F);
            label3.Location = new Point(18, 95);
            label3.Name = "label3";
            label3.Size = new Size(38, 15);
            label3.TabIndex = 1;
            label3.Text = "label3";
            // 
            // label2
            // 
            label2.AutoSize = true;
            label2.Font = new Font("Segoe UI", 9F);
            label2.Location = new Point(18, 22);
            label2.Name = "label2";
            label2.Size = new Size(38, 15);
            label2.TabIndex = 0;
            label2.Text = "label2";
            // 
            // groupBox2
            // 
            groupBox2.BackColor = Color.Transparent;
            groupBox2.Controls.Add(btnRegresar);
            groupBox2.Controls.Add(btnGuardar);
            groupBox2.Controls.Add(lbDatos);
            groupBox2.Controls.Add(dgvDatos);
            groupBox2.Font = new Font("Showcard Gothic", 9F, FontStyle.Regular, GraphicsUnit.Point, 0);
            groupBox2.Location = new Point(265, 33);
            groupBox2.Name = "groupBox2";
            groupBox2.Size = new Size(686, 405);
            groupBox2.TabIndex = 2;
            groupBox2.TabStop = false;
            groupBox2.Text = "groupBox2";
            // 
            // btnRegresar
            // 
            btnRegresar.Location = new Point(468, 357);
            btnRegresar.Name = "btnRegresar";
            btnRegresar.Size = new Size(75, 23);
            btnRegresar.TabIndex = 3;
            btnRegresar.Text = "button2";
            btnRegresar.UseVisualStyleBackColor = true;
            btnRegresar.Click += btnRegresar_Click;
            // 
            // btnGuardar
            // 
            btnGuardar.Location = new Point(216, 357);
            btnGuardar.Name = "btnGuardar";
            btnGuardar.Size = new Size(75, 23);
            btnGuardar.TabIndex = 2;
            btnGuardar.Text = "button1";
            btnGuardar.UseVisualStyleBackColor = true;
            btnGuardar.Click += btnGuardar_Click;
            // 
            // lbDatos
            // 
            lbDatos.Font = new Font("Segoe UI", 9F, FontStyle.Regular, GraphicsUnit.Point, 0);
            lbDatos.FormattingEnabled = true;
            lbDatos.ItemHeight = 15;
            lbDatos.Location = new Point(16, 186);
            lbDatos.Name = "lbDatos";
            lbDatos.Size = new Size(652, 154);
            lbDatos.TabIndex = 1;
            // 
            // dgvDatos
            // 
            dgvDatos.ColumnHeadersHeightSizeMode = DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            dgvDatos.Location = new Point(17, 25);
            dgvDatos.Name = "dgvDatos";
            dgvDatos.Size = new Size(651, 150);
            dgvDatos.TabIndex = 0;
            dgvDatos.CellContentClick += dgvDatos_CellContentClick;
            // 
            // Ingresar
            // 
            AutoScaleDimensions = new SizeF(7F, 15F);
            AutoScaleMode = AutoScaleMode.Font;
            ClientSize = new Size(963, 450);
            Controls.Add(groupBox2);
            Controls.Add(groupBox1);
            Controls.Add(label1);
            Name = "Ingresar";
            Text = "Form1";
            Load += Ingresar_Load;
            groupBox1.ResumeLayout(false);
            groupBox1.PerformLayout();
            groupBox2.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)dgvDatos).EndInit();
            ResumeLayout(false);
            PerformLayout();
        }

        #endregion

        private Label label1;
        private GroupBox groupBox1;
        private TextBox txtPrecipitacion;
        private TextBox txtHumedad;
        private TextBox txtTemperatura;
        private ComboBox cbMes;
        private ComboBox cbDepartamento;
        private Label label6;
        private Label label5;
        private Label label4;
        private Label label3;
        private Label label2;
        private GroupBox groupBox2;
        private DataGridView dgvDatos;
        private Button btnRegresar;
        private Button btnGuardar;
        private ListBox lbDatos;
    }
}