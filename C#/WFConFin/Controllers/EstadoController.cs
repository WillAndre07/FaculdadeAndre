using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using WFConFin.Models;

namespace WFConFin.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class EstadoController : ControllerBase
    {
        public static List<Estado> listaEstados = new List<Estado>();

        [HttpGet]
        public List<Estado> getEstado() {
            return listaEstados;
        }

        [HttpGet("Outro")]
        public List<Estado> getOutro()
        {
            return listaEstados;
        }

        //Parametro de rota
        [HttpGet("{sigla}")]
        public Estado getEstado(string sigla)
        {
            var estadoOld = new Estado();
            try
            {
                estadoOld = listaEstados.Where(e => e.sigla == sigla).First();
                
            }
            catch (Exception ex)
            {
                //resultado = "Erro ao alterar estado. " + ex.Message;
            }
            return estadoOld;
        }

        //Quewrry params
        [HttpGet("Get2")]
        public Estado getEstado2([FromQuery] string sigla)
        {
            var estadoOld = new Estado();
            try
            {
                estadoOld = listaEstados.Where(e => e.sigla == sigla).First();

            }
            catch (Exception ex)
            {
                //resultado = "Erro ao alterar estado. " + ex.Message;
            }
            return estadoOld;
        }

        //Header params
        [HttpGet("Get3")]
        public Estado getEstado3([FromHeader] string sigla)
        {
            var estadoOld = new Estado();
            try
            {
                estadoOld = listaEstados.Where(e => e.sigla == sigla).First();

            }
            catch (Exception ex)
            {
                //resultado = "Erro ao alterar estado. " + ex.Message;
            }
            return estadoOld;
        }

        [HttpPost]
        public string postEstado(Estado novoEstado)
        {
            listaEstados.Add(novoEstado);
            string teste = "Estado incluido!";
            return teste;
        }

        [HttpPut]
        public string putEstado(Estado estado)
        {
            string resultado = "Estado invalido!";
            try
            {
                var estadoOld = listaEstados.Where(e => e.sigla == estado.sigla).First();
                if (estadoOld != null)
                {
                    estadoOld.nome = estado.nome;
                    resultado = "Estado alterado";
                }
            }catch(Exception ex)
            {
                resultado = "Erro ao alterar estado. " + ex.Message;
            }
            return resultado;
            //select * from estado as e where sigla = SC
        }

        [HttpDelete]
        public string deleteEstado(Estado estado)
        {
            string resultado = "Estado invalido!";
            try
            {
                var estadoOld = listaEstados.Where(e => e.sigla == estado.sigla).First();
                if (estadoOld != null)
                {
                    listaEstados.Remove(estadoOld);
                    resultado = "Estado excluido";
                }
            }
            catch (Exception ex)
            {
                resultado = "Erro ao excluir estado. " + ex.Message;
            }
            return resultado;
        }

        //Complemento de rota + paramnetro de rota
        [HttpDelete("Delete/{sigla}")]
        public string deleteEstado2(string sigla)
        {
            string resultado = "Estado invalido!";
            try
            {
                var estadoOld = listaEstados.Where(e => e.sigla == sigla).First();
                if (estadoOld != null)
                {
                    listaEstados.Remove(estadoOld);
                    resultado = "Estado excluido";
                }
            }
            catch (Exception ex)
            {
                resultado = "Erro ao excluir estado. " + ex.Message;
            }
            return resultado;
        }
    }
}
