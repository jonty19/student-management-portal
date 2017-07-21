Imports MySql.Data.MySqlClient
Imports System.Web
Imports System.IO
Imports System.Net.Mail
Public Class Form5
    Dim con As MySqlConnection
    Dim cm As MySqlCommand
    Dim book_name As String = Nothing
    Dim author As String = Nothing
    Dim acc_no As String = Nothing
    Dim userid As String = Form2.user
    Dim username As String = Nothing
    Private Sub Form5_Load(sender As Object, e As EventArgs) Handles MyBase.Load
        con = New MySqlConnection
        con.ConnectionString = "server= 127.0.0.1;userid= root ;password= password;database= database3"
        Try
            con.Open()
            Dim Query As String = Nothing
            Query = "select * from library.admin_list where userid= @user "
            cm = New MySqlCommand(Query, con)
            cm.Parameters.AddWithValue("user", userid)
            Dim adaptor As New MySqlDataAdapter(cm)
            Dim table As New DataTable
            adaptor.Fill(table)
            If table.Rows.Count() > 0 Then
                userid = table.Rows(0)(0)
                username = table.Rows(0)(1)
                TextBox1.Text = userid
                TextBox2.Text = username
            End If

            con.Close()

        Catch ex As MySqlException
            MessageBox.Show(ex.Message)
        Finally
            con.Dispose()
        End Try

    End Sub

    Private Sub Button1_Click(sender As Object, e As EventArgs) Handles insertion.Click

    End Sub

    Private Sub Button2_Click(sender As Object, e As EventArgs) Handles search.Click
        con = New MySqlConnection
        con.ConnectionString = "server= 127.0.0.1;userid= root ;password= password;database= database3"
        Try
            con.Open()
            Dim Query As String = Nothing
            book_name = TextBox3.Text
            author = TextBox4.Text
            Query = "select * from library.book_list where co= @book_name and auther = @author"
            cm = New MySqlCommand(Query, con)
            cm.Parameters.AddWithValue("book_name", book_name)
            cm.Parameters.AddWithValue("author", author)
            Dim adaptor As New MySqlDataAdapter(cm)
            Dim table As New DataTable
            adaptor.Fill(table)
            If table.Rows.Count() > 0 Then
                book_name = table.Rows(0)(0)
                author = table.Rows(0)(1)
                acc_no = table.Rows(0)(2)
                If MessageBox.Show("book is available", "successfull", MessageBoxButtons.OK, MessageBoxIcon.Information) = DialogResult.OK Then
                    Dim receiver As String = InputBox("enter the email address of the student", "receiver address")
                    Try
                        Dim mail As New MailMessage
                        Dim smtpserver As New SmtpClient
                        Dim admin_mail As String = "admin_id@gmail.com"
                        smtpserver.Credentials = New Net.NetworkCredential("admin_id@gmail.com", "password")
                        smtpserver.Port = "587"
                        smtpserver.Host = "smtp.gmail.com"
                        smtpserver.EnableSsl = True
                        mail.To.Add(receiver)
                        mail.From = New MailAddress(admin_mail)
                        mail.Subject = "requiest is accepted"
                        mail.Body = "Dear " + receiver + " ,your requiest for the book  " + book_name + " by  " + author + " is accepted..and your approved book's acc on is " + acc_no + "... you can collect it from library now."
                        smtpserver.Send(mail)
                        MsgBox("message has been sent successfully...")
                    Catch ex As Exception
                        MsgBox(ex.Message)
                    End Try
                End If
            Else
                If MessageBox.Show("book is not available", "unsuccessfull", MessageBoxButtons.OK, MessageBoxIcon.Information) = DialogResult.OK Then
                    Dim receiver As String = InputBox("enter the email address of the student", "receiver address")
                    Try
                        Dim mail As New MailMessage
                        Dim smtpserver As New SmtpClient
                        Dim admin_mail As String = "admin_id@gmail.com"
                        smtpserver.Credentials = New Net.NetworkCredential("admin_id@gmail.com", "password")
                        smtpserver.Port = "587"
                        smtpserver.Host = "smtp.gmail.com"
                        smtpserver.EnableSsl = True
                        mail.To.Add(receiver)
                        mail.From = New MailAddress(admin_mail)
                        mail.Subject = "requiest is rejected"
                        mail.Body = "Dear " + receiver + " ,your requiest for the book  " + book_name + " by  " + author + " is not approved..."
                        smtpserver.Send(mail)
                        MsgBox("message has been sent successfully...")
                    Catch ex As Exception
                        MsgBox(ex.Message)
                    End Try
                End If
            End If

            con.Close()

        Catch ex As MySqlException
            MessageBox.Show(ex.Message)
        Finally
            con.Dispose()
        End Try
    End Sub
End Class
