using System;
using System.Windows.Forms;

namespace GestionPharmacie
{
    static class Program
    {
        /// <summary>
        /// Point d'entrée principal de l'application.
        /// </summary>
        [STAThread]
        static void Main()
        {
            Application.EnableVisualStyles();
            Application.SetCompatibleTextRenderingDefault(false);
            
            // Lance le formulaire de gestion des médicaments au démarrage
            Application.Run(new FrmMedicament());
        }
    }
}
