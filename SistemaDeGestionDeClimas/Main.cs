namespace SistemaDeGestionDeClimas
{
    public partial class Main : Form
    {
        private int contador = 0; // Contador para los datos ingresados
        public static double[,,] datosClimaticos = new double[14, 12, 3]; //[Departamentos, meses, parámetros]

        public Main()
        {
            InitializeComponent();

            //Para la imagen de fondo:
            this.BackgroundImage = Image.FromFile("D:\\segundoaño\\modulo2.1\\Programación_DiegoElias#6\\SistemaDeGestionDeClimas\\img\\fondoMain.png");
            this.BackgroundImageLayout = ImageLayout.Stretch; //Hace que la imagen se ajuste al tamaño de la pantalla
        }

        private void Main_Load(object sender, EventArgs e)
        {
            label1.Text = "Sistema para\n " +
                          "        Control Climático";
            btnIngresar.Text = "Ingreso";
            btnPromedioTendencias.Text = "Promedios";
            btnGrafico.Text = "Graficar";
            btnSalir.Text = "Salir";

        }

        private void btnIngresar_Click(object sender, EventArgs e)
        {
            Ingresar ingresar = new Ingresar();
            this.Hide();
            ingresar.ShowDialog();
            this.Show();

        }

        private void btnPromedioTendencias_Click(object sender, EventArgs e)
        {
            PromediosTendencias promediosTendencias = new PromediosTendencias();
            this.Hide();
            promediosTendencias.ShowDialog();
            this.Show();
        }


        private void btnGrafico_Click(object sender, EventArgs e)
        {
            Graficas graficas = new Graficas();
            this.Hide();
            graficas.ShowDialog();
            this.Show();
        }


        private void btnSalir_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }
    }
}
