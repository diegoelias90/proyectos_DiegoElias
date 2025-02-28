namespace SistemaDeGestionDeClimas
{
    partial class Main
    {
        /// <summary>
        ///  Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        ///  Clean up any resources being used.
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
        ///  Required method for Designer support - do not modify
        ///  the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            btnIngresar = new Button();
            btnPromedioTendencias = new Button();
            btnGrafico = new Button();
            btnSalir = new Button();
            label1 = new Label();
            SuspendLayout();
            // 
            // btnIngresar
            // 
            btnIngresar.BackColor = Color.Transparent;
            btnIngresar.Font = new Font("Segoe UI", 14.25F, FontStyle.Bold, GraphicsUnit.Point, 0);
            btnIngresar.Location = new Point(161, 243);
            btnIngresar.Name = "btnIngresar";
            btnIngresar.Size = new Size(123, 41);
            btnIngresar.TabIndex = 0;
            btnIngresar.Text = "ingresar";
            btnIngresar.UseVisualStyleBackColor = false;
            btnIngresar.Click += btnIngresar_Click;
            // 
            // btnPromedioTendencias
            // 
            btnPromedioTendencias.BackColor = Color.Transparent;
            btnPromedioTendencias.Font = new Font("Segoe UI", 14.25F, FontStyle.Bold, GraphicsUnit.Point, 0);
            btnPromedioTendencias.Location = new Point(161, 290);
            btnPromedioTendencias.Name = "btnPromedioTendencias";
            btnPromedioTendencias.Size = new Size(123, 36);
            btnPromedioTendencias.TabIndex = 1;
            btnPromedioTendencias.Text = "button2";
            btnPromedioTendencias.UseVisualStyleBackColor = false;
            btnPromedioTendencias.Click += btnPromedioTendencias_Click;
            // 
            // btnGrafico
            // 
            btnGrafico.BackColor = Color.Transparent;
            btnGrafico.Font = new Font("Segoe UI", 14.25F, FontStyle.Bold, GraphicsUnit.Point, 0);
            btnGrafico.Location = new Point(161, 332);
            btnGrafico.Name = "btnGrafico";
            btnGrafico.Size = new Size(123, 37);
            btnGrafico.TabIndex = 2;
            btnGrafico.Text = "button3";
            btnGrafico.UseVisualStyleBackColor = false;
            btnGrafico.Click += btnGrafico_Click;
            // 
            // btnSalir
            // 
            btnSalir.BackColor = Color.Transparent;
            btnSalir.Font = new Font("Segoe UI", 14.25F, FontStyle.Bold, GraphicsUnit.Point, 0);
            btnSalir.Location = new Point(161, 375);
            btnSalir.Name = "btnSalir";
            btnSalir.Size = new Size(123, 40);
            btnSalir.TabIndex = 3;
            btnSalir.Text = "button4";
            btnSalir.UseVisualStyleBackColor = false;
            btnSalir.Click += btnSalir_Click;
            // 
            // label1
            // 
            label1.AutoSize = true;
            label1.BackColor = Color.Transparent;
            label1.Font = new Font("Showcard Gothic", 24F, FontStyle.Regular, GraphicsUnit.Point, 0);
            label1.Location = new Point(46, 122);
            label1.Name = "label1";
            label1.Size = new Size(123, 40);
            label1.TabIndex = 5;
            label1.Text = "label1";
            // 
            // Main
            // 
            AutoScaleDimensions = new SizeF(7F, 15F);
            AutoScaleMode = AutoScaleMode.Font;
            ClientSize = new Size(800, 450);
            Controls.Add(label1);
            Controls.Add(btnSalir);
            Controls.Add(btnGrafico);
            Controls.Add(btnPromedioTendencias);
            Controls.Add(btnIngresar);
            Name = "Main";
            Text = "Form1";
            Load += Main_Load;
            ResumeLayout(false);
            PerformLayout();
        }

        #endregion

        private Button btnIngresar;
        private Button btnPromedioTendencias;
        private Button btnGrafico;
        private Button btnSalir;
        private Label label1;
    }
}
